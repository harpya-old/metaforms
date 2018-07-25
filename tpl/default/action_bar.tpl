<div class="btn-group">
    {foreach from=$actionBar->getActionItems() item=item}
        {$item->render()}
    {/foreach}
</div>
