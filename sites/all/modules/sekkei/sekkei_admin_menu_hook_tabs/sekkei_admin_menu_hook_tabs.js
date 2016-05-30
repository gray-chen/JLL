(function($) {
    /**
     * Replace the normal tabs Admin menu behavior
     */
    try {
        if(Drupal.admin.behaviors) {
            Drupal.admin.behaviors.pageTabs = function (context, settings, $adminMenu) {
                if (settings.admin_menu.tweak_tabs) {
                    var $tabs_primary = $(context).find('ul.tabs.primary').clone().find('li');
                    $tabs_primary.removeClass().addClass('admin-menu-tab');
                    $tabs_primary.find('a').removeClass();
                    var $tabs_secondary = $(context).find('ul.tabs.secondary').clone();
                    $tabs_secondary.removeClass().addClass("dropdown");
                    $tabs_secondary.find('a').removeClass();

                    //Inject tabs to the admin bar
                    $adminMenu.find('#admin-menu-wrapper > ul').eq(1).append($tabs_primary);
                    $tabs_primary.find("a.active").each(function () {
                        $(this).parent().addClass("expandable active");
                    });

                    //Inject the secondary tabs to the admin bar
                    $tabs_secondary.appendTo('#admin-menu-wrapper > ul > li.admin-menu-tab.active');

                    //If not on the backend we remove it
                    if (!Drupal.settings.sekkei_admin_menu_hook_tabs.isBackend && $("body.page-user").length <= 0) {
                        $(context).find('ul.tabs.primary').remove();
                        $(context).find('ul.tabs.secondary').remove();
                    }
                }
            };
        }
    } catch(e) {}
})(jQuery);
