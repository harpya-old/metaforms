{literal}
$( document ).ready(function() {

{/literal}{if ($form->getValidationJS())}{literal}
$('#{/literal}{$form->getId()}{literal}').validator().on('submit', function (e) {

    {/literal}{$form->getValidationJS()}{literal}


    if (e.isDefaultPrevented()) {
    // handle the invalid form...
    } else {
    // everything looks good!
    }
    })
{/literal}






{/if}{literal}

});
{/literal}