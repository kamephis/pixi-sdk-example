<?php
use Pixi\API\Soap\Options;
use Pixi\AppsFactory\Factory;
use Pixi\AppsFactory\Environment;

class PixiController extends CI_Controller
{

    public $api = null;

    public $db = null;

    public $customerdb = null;

    protected $ID = 0;

    protected $Messages;

    const MessageSuccess = 'alert-success';

    const MessageWarning = 'alert-warning';

    const MessageError = 'alert-danger';

    const MessageInfo = 'alert-info';

    public $pixiLog;

    public $pixiapi;
    
    protected $mainLayout = 'main_view';

    public function __construct()
    {
        parent::__construct();
        // Load default pixi config settings
        $this->config->load('pixi');
        
        //start session for local dev
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
            $customer = $this->config->config['api']['username'];
            preg_match('/pixi+_?(.*)/', $customer, $matches);
            $_SESSION['userinfo']['pixi_db'] = $matches[1];
        }

        // Check for authentication
        $this->checkAuth();
        
        $config = $this->config->item('api');
        
        $soapOptions = new \Pixi\API\Soap\Options($config['username'], $config['password'], $config['uri'], $config['location']);
        if(isset($config['ssl_method'])) {
            $soapOptions->setSslMethod($config['ssl_method']);
        }
        if(isset($config['allow_self_signed'])) {
            $soapOptions->allowSelfSigned($config['allow_self_signed']);
        }
        Factory::addOption('soap', $soapOptions);
        $this->pixiapi = Factory::createObject('\Pixi\API\Soap\Client', 'soap');
        
        $db = $this->config->item('db');
        $customerdb = $this->config->item('customer_db');
        
        $this->customerdb = $this->load->database($customerdb, true);
        $this->db = $this->load->database($db, true);
    }

    /**
     * renderElement
     *
     * @param unknown $element            
     * @return string pixiTable
     */
    protected function renderElement($element)
    {
        $this->ID ++;
        if (is_object($element) && method_exists($element, 'generateHTML')) {
            $result = $element->generateHTML($this->ID);
        } else {
            $result = array(
                'body' => $element
            );
        }
        ;
        
        if (! isset($result['head']))
            $result['head'] = '';
        if (! isset($result['script']))
            $result['script'] = '';
        
        return $result;
    }

    /**
     * Sets a notifier on the page.
     *
     * @param unknown $Message            
     * @param unknown $MessageType            
     */
    public function addMessage($Message, $MessageType)
    {
        $this->Messages[] = array(
            'Message' => $Message,
            'MessageType' => $MessageType
        );
    }

    public function loadMainView($title, $subTitle, $body, $htmlHeadAdd = '', $htmlBottomAdd = '')
    {
        
        /**
         * Handle the body.
         * It might be just one string or an array of objects.
         */
        $html = '';
        
        if (is_array($body)) {
            foreach ($body as $element) {
                $rendered = $this->renderElement($element);
                $html .= $rendered['body'];
                $htmlHeadAdd .= $rendered['head'];
                $htmlBottomAdd .= $rendered['script'];
            }
        } else {
            $rendered = $this->renderElement($body);
            $html .= $rendered['body'];
            $htmlHeadAdd .= $rendered['head'];
            $htmlBottomAdd .= $rendered['script'];
        }
        
        $this->load->view($this->mainLayout, array(
            'app_title' => $this->getAppTitle(),
            'title' => $title,
            'htmlHead' => $htmlHeadAdd,
            'htmlBottom' => $htmlBottomAdd,
            'subtitle' => $subTitle,
            'body' => $html,
            'menu' => $this->generateMenu(),
            'logDropDown' => $this->generateLogDropDown(),
            'userDropDown' => $this->generateUserDropDown(),
            'searchForm' => $this->generateSearchForm(),
            'Messages' => $this->Messages,
            'pixidatabase' => (!empty($this->app->pixi_db)?$this->app->pixi_db : null),
            'customer' => (!empty($this->app->pixi_username)?$this->app->pixi_username : null),
        ));
    }

    /**
     * Check if user is logged in.
     * If session data exists it means that user is logged in.
     * If user is logged in we need to replace our default config data with configuration
     * data from session. Replace only those config data that exists in session.
     *
     * @return boolean: Returns TRUE if useris logged in, FALSE otherwise.
     */
    private function checkAuth()
    {
        $isLoggedIn = false;

        // Do we have login session data?
        if (session_id() != '' && ! empty($_SESSION)) {
            
            $isLoggedIn = true;
            
            // Set API credentials and save them back to config
            if (!empty($_SESSION['accessdata'])) {
                $api = $this->config->item('api');
                $api = array_merge($api, $_SESSION['accessdata']);
                if(isset($_SESSION['accessdata']['namespace'])) {
                    $api['uri'] = $_SESSION['accessdata']['namespace'];
                }
                if(isset($_SESSION['accessdata']['endpoint'])) {
                    $api['location'] = $_SESSION['accessdata']['endpoint'];
                }
                $this->config->set_item('api', $api);
            }
            
            // Set default DB settings
            if (!empty($_SESSION['ENV']['db'])) {
                $db = $this->config->item('db');
                $db = array_merge($db, $_SESSION['ENV']['db']);
                $db['password'] = crc32($db['password']);
                $this->config->set_item('db', $db);
            }
            
            // Set customer DB settings
            if (!empty($_SESSION['ENV']['customer_db'])) {
                $cdb = $this->config->item('customer_db');
                $cdb = array_merge($cdb, $_SESSION['ENV']['customer_db']);
                $this->config->set_item('customer_db', $cdb);
            }
             
        }
        
        return $isLoggedIn;
    }
}
