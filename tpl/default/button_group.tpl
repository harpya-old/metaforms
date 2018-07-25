<button type="button" id="{$btn->getId()}" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">{$btn->getTitle()}
    <span class="caret"></span></button>
<ul class="dropdown-menu" role="menu" >
        {foreach from=$btn->getItems() item=item}
            <li><a href="{$item->getUri()|default:"#"}">{$item->getTitle()}</a></li>
        {/foreach}

    </ul>

