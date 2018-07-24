<div class="col-md-12">
    <div class="form-group">
        <label for='{$field->getID()}'>{$field->getTitle()}</label>

        {foreach from=$field->getOptions() item=option}
            <div  class="checkbox" {if $option->getState()==0}disabled{/if}>
                <label><input type="checkbox" name='{$field->getCode()}' id='{$field->getID()}' value="{$option->getKey()}" {if $option->getState()==0}disabled{/if}>{$option->getValue()}</label>
            </div>
        {/foreach}

    </div>
</div>
