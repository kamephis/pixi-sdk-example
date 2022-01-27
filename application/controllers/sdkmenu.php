<?php

use Pixi\Ui\Menu\Menu;
use Pixi\Ui\Menu\MenuItem;
use Pixi\Ui\UIControllerInterface;

date_default_timezone_set('CET');

/**
 * Class SDKMenu
 */
class SDKMenu extends PixiController implements UIControllerInterface
{
    /**
     * SDKMenu constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    function getAppTitle()
    {
        return 'pixi SDK';
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function generateMenu()
    {
        $mainMenu = new Menu();
        $mainMenu->addMenuItem(new MenuItem('demo/dashboard', 'Dashboard', 'fa-tachometer'));
        $mainMenu->addMenuItem(new MenuItem('demo/api', 'API Library', 'fa-random'));
        $mainMenu->addMenuItem(new MenuItem('', 'UI Library', 'fa-edit', new Menu(array(
            new MenuItem('demo/uilibrary/tables', 'Tables'),
            new MenuItem('demo/uilibrary/charts', 'Charts'),
            new MenuItem('demo/uilibrary/payments', 'Payments Dropdown'),
            new MenuItem('demo/uilibrary/forms', 'Forms'),
            new MenuItem('demo/uilibrary/info', 'Info Element'),
            new MenuItem('demo/uilibrary/datalist', 'DataList'),
            new MenuItem('demo/uilibrary/timeline', 'Timeline')
        ))));
        $mainMenu->addMenuItem(new MenuItem('', 'UI & Elements', 'fa-desktop', new Menu(array(
            new MenuItem('demo/uielements/typography', 'Typography'),
            new MenuItem('demo/uielements/elements', 'Elements'),
            new MenuItem('demo/uielements/buttons', 'Buttons & Icons'),
            new MenuItem('demo/uielements/treeview', 'Treeview'),
            new MenuItem('demo/uielements/jquery_ui', 'jQuery UI'),
            new MenuItem('demo/uielements/nestable_list', 'Nestable Lists')
        ))));
        $mainMenu->addMenuItem(new MenuItem('', 'Tables', 'fa-list', new Menu(array(
            new MenuItem('demo/tables/tables', 'Simple & Dynamic'),
            new MenuItem('demo/tables/jqgrid', 'jqGrid plugin')
        ))));
        $mainMenu->addMenuItem(new MenuItem('', 'Forms', 'fa-pencil-square-o', new Menu(array(
            new MenuItem('demo/forms/form_elements', 'Form Elements'),
            new MenuItem('demo/forms/form_wizard', 'Wizard & Validation'),
            new MenuItem('demo/forms/wysiwyg', 'Wysiwyg & Markdown')
        ))));
        $mainMenu->addMenuItem(new MenuItem('demo/widgets', 'Widgets', 'fa-list-alt'));
        $mainMenu->addMenuItem(new MenuItem('', 'More Pages', 'fa-tag', new Menu(array(
            new MenuItem('demo/more/inbox', 'Inbox'),
            new MenuItem('demo/more/pricing', 'Pricing Tables'),
            new MenuItem('demo/more/invoice', 'Invoice'),
            new MenuItem('demo/more/timeline', 'Timeline')
        ))));
        $mainMenu->addMenuItem(new MenuItem('', 'Other Pages', 'fa-file-o', new Menu(array(
            new MenuItem('demo/other/faq', 'FAQ'),
            new MenuItem('demo/other/error404', 'Error 404'),
            new MenuItem('demo/other/error500', 'Error 500'),
            new MenuItem('demo/other/grid', 'Grid'),
            new MenuItem('demo/other/blank', 'Blank Page')
        )), 5));

        return $mainMenu;
    }

    public function generateUserDropDown()
    {}

    public function generateLogDropDown()
    {}

    public function generateSearchForm()
    {}
}
