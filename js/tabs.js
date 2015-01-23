jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        
        // Change Border
        if (currentAttrValue == '#tab1') {
        jQuery('.tabs .tab-content').addClass('bord1').removeClass('bord2 bord3');
        }
        else if (currentAttrValue == '#tab2') {
        jQuery('.tabs .tab-content').addClass('bord2').removeClass('bord1 bord3');
        }
        else if (currentAttrValue == '#tab3') {
        jQuery('.tabs .tab-content').addClass('bord3').removeClass('bord1 bord2');
        }
        
        e.preventDefault();
    });
});