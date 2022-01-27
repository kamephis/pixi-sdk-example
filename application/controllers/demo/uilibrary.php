<?php

// Including library classes
use Pixi\Ui\Table\Table;
use Pixi\Ui\Data\DataFormat;
use Pixi\Ui\Chart\Chart;
use Pixi\Ui\Dropdown\PaymentsDropdown;
use Pixi\Ui\Form\Form;
use Pixi\Ui\Form\FormElement;
use Pixi\Ui\Info\Info;
use Pixi\Ui\Info\InfoElement;
use Pixi\Ui\DataList\DataList;
use Pixi\Ui\Timeline\Timeline;
use Pixi\Ui\Timeline\TimelineElement;

class Uilibrary extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function tables()
    {        
        // Load view
        $tablesView = $this->load->view('demo/uilibrary/tables', null, true);
        
        $result = $this->pixiapi->pixiGetCountries();

        $countryTable = new Table('List of all Countries', Table::TableTypeDataTables);
        $countryTable->addColumn('CntCode', 'ISO Code', DataFormat::FORMAT_STRING);
        $countryTable->addColumn('CntName', 'Country Name', DataFormat::FORMAT_STRING);
        $countryTable->addColumn('DefShipCosts', 'Std Shipping Costs', DataFormat::FORMAT_MONEY);
        $countryTable->addRows($result->getResultset());

        $this->loadMainView('UI Library - Tables', 'Rapid development with less code', array($tablesView, $countryTable));
    }
    
    public function charts()
    {
        // Load view
        $chartView = $this->load->view('demo/uilibrary/charts', null, true);
        
        // Prepared data for demo
        $data = array(
            array('country' => 'Germany', 'population' => 81890000),
            array('country' => 'Slovenia', 'population' => 2000000),
            array('country' => 'Austria', 'population' => 8460000)
        );
        
        $chart = new Chart('Statistics');
        $chart->addColumn('country', 'Country');
        $chart->addColumn('population', 'Population', 'number');
        
        // Adding data to chart
        $chart->addRows($data);

        $this->loadMainView('UI Library - Charts', 'Rapid development with less code', array($chartView, $chart));
    }
    
    public function payments()
    {
        $defaultDropdown = new PaymentsDropdown(null, null, 'payments', 'paypal');
        $defaultDropdown = $defaultDropdown->render();
        
        $adjustedDropdown = new PaymentsDropdown('PaymentText', 'Code', 'payments', 'paypal');
        $adjustedDropdown = $adjustedDropdown->render();
        
        $paymentsView = $this->load->view('demo/uilibrary/payments', array(
            'defaultDropdown' => $defaultDropdown,
            'adjustedDropdown' => $adjustedDropdown
        ), true);
        
        $paymentsDropdown = new PaymentsDropdown(null, null, 'payments', 'paypal');
        
        $this->loadMainView('UI Library - Payments Dropdown', 'Most used functionallity with one line of code', $paymentsView);        
    }
    
    public function forms()
    {
        $formView = $this->load->view('demo/uilibrary/form', null, true);
        $formDetailView = $this->load->view('demo/uilibrary/formdetail', null, true);
        
        $form = new Form('demo/uilibrary/forms');
        $form->addElement('name', FormElement::ElementTypeString, 'Name:');
        $form->addElement('age', FormElement::ElementTypeNumber, 'Age:');
        $form->addElement('readonly', FormElement::ElementTypeReadOnly, 'I am readonly:', 'This value can\'t be changed');
        $form->addElement('password', FormElement::ElementTypePassword, 'Password:', 'password');
        
        $this->loadMainView('UI Library - Forms', 'Simple forms without a single line of html', array($formView, $form, $formDetailView));
    }
    
    public function info() 
    {
        $info = $this->load->view('demo/uilibrary/info', null, true);
        // Create new Info Element
        $el = new Info('Title of the Info');

        // Add Info
        $el->addElement(new InfoElement('Info Title', 'Subinfo title', 'fa-heart', 'green', ''));
        $el->addElement(new InfoElement('Info Title', 'Subinfo title', 'fa-flag', 'red', ''));
        $el->addElement(new InfoElement('Info Title', 'Subinfo title', 'fa-question', 'orange', ''));

        // Load main view
        $this->loadMainView('UI Library - Info', 'Simple Info element', array($el, $info));
    }
    
    public function datalist()
    {
        $datalist = $this->load->view('demo/uilibrary/datalist', null, true);

        // The data to display
        $data = array('country' => 'Germany', 'population' => 81890000);

        // Create new DataList Element
        $el = new DataList('Countries and population');

        // Add DataList fields
        $el->addElement('country', DataFormat::FORMAT_STRING, 'Country');
        $el->addElement('population', DataFormat::FORMAT_NUMBER, 'Population');

        // Fill DataList with values
        $el->addValues($data);

        // Display the DataList Element
        $this->loadMainView('Data List Example', 'Data list example', array($el, $datalist));        
    }
    
    public function timeline() 
    {
        $timeline = $this->load->view('demo/uilibrary/timeline', null, true);
        
        $el = new Timeline('Timeline example');

        $el->addElement(new TimelineElement(
                'First event', 
                'This is the description of the first element', 
                '2014-09-23 12:06', 
                null, 
                'fa-asterisk',
                'null',
                'primary'
        ));

        $el->addElement(new TimelineElement(
                'Second event', 
                'This is the description of the second element', 
                '2014-09-23 12:06', 
                null, 
                'fa-music',
                'http://www.music.com', 
                'danger'
        ));

        // Load main view
        $this->loadMainView('Timeline example', 'small example', array($el, $timeline));
    }
}
