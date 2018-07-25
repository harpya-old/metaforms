<div class="col-md-12">
<div class="form-group has-feedback">




    <label for='{$field->getID()}'>{$field->getTitle()}</label>

    {*<div class="input-group">*}

    <input type='text' name='{$field->getCode()}' id='{$field->getID()}'
           value="{$field->getValue()}"
           class="form-control"

            {if ($field->isRequired()) }
                required

                data-error="{$field->getEmptyErrorMessage()|default:'This field is required'}"

            {/if}
    >



    {*</div>*}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
   {* <div class="help-block with-errors">{$field->getEmptyErrorMessage()|default:"This field is required"}</div> *}

</div>


</div>

