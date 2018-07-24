
<div class="panel panel-default" id="{$group->getID()}" >
        {if $group->getTitle()}
        <div class="panel-heading">{$group->getTitle()}</div>
        {/if}
        <div class="panel-body">
                {foreach from=$group->getChildren() item=field}
                                {$field->render()}
                {/foreach}

        </div>

</div>

