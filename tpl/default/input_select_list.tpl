<div class="col-md-12">
    <div class="form-group">

        <label for='{$field->getID()}'>{$field->getTitle()}</label>
        <select class="form-control" id="{$field->getID()}" name='{$field->getCode()}'>
            {foreach from=$field->getOptions() item=option}
                <option value="{$option->getKey()}">{$option->getValue()} </option>
            {/foreach}
        </select>


    </div>
</div>
