<div id="{$group->getID()}" style="border:solid 1px grey">
    
    {foreach from=$group->getChildren() item=field}
        <div >
            
            {$field->render()}
            
        </div>
    {/foreach}
    
</div>