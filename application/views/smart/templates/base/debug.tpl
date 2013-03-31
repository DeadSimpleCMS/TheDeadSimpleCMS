<br>
<div class="container-fluid">
<div class='row-fluid'>
<div class='span5'>

<h6><i class="icon-bullhorn"></i> Debug = true</h6>

{foreach from=$data key=key item=value}
    {if is_object($value)}
        <h4>{$key}; is an object.</h4>
        <ul class="unstyled">
        {foreach from=$value key=objKey item=objVal}
            <li>{$objKey}: {$objVal}</li>
        {/foreach}
        </ul>
    {elseif is_array($value)}
        <h4>{$key}; is an Array.</h4>
        <ul class="unstyled">
        {foreach from=$value key=arrKey item=arrVal}
            <li>{$arrKey}: {$arrVal}</li>
        {/foreach}
        </ul>
    {else}
        <pre>{$key}: {$value}</pre>
    {/if}
{/foreach}
</div>

</div>
</div>