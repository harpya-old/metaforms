<div class="row">


    <form method="{$form->getMethod()}" action="{$form->getAction()}" >
        <div class="panel panel-default">
            {if $form->getTitle()}
            <div class="panel-heading">{$form->getTitle()}</div>
                {/if}
            <div class="panel-body">{$form->getContents()}</div>

            {if $form->getActionBar()}
                <div class="panel-footer">{$form->getActionBar()}</div>
            {/if}


        </div>




    </form>
</div>
