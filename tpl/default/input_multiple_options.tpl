<div class="col-md-12">
    <div class="form-group"  id='{$field->getID()}'>
        <label for='{$field->getID()}'>{$field->getTitle()}

            <div class="help-blockxx with-errors text-danger">{$field->getEmptyErrorMessage()|default:"This field is required"}</div>
        </label>

        {foreach from=$field->getOptions() item=option}
            <div  class="checkbox"

                  {if $option->getState()==0}disabled{/if}>
                <label>
                    <input type="checkbox"
                              name='{$field->getCode()}[{$option->getKey()}]'
                           idxx='{$field->getID()}_{$option->getKey()}'
                           value="{$option->getKey()}"
                           {if $option->getState()==0}disabled{/if}
                           {if $option->isSelected()}checked{/if}
                    >{$option->getValue()}
                </label>
            </div>
        {/foreach}


    </div>
    {*<span class="glyphicon form-control-feedback text-danger" aria-hidden="true"></span>*}


</div>
