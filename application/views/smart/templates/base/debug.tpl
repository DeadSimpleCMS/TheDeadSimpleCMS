<br>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h6 class="btn btn-danger btn-block"><i class="icon-eye-open icon-white"></i>
                $settings['debug_output'] = true in settings_conf.php, Set to false to remove this window.</h6>
        </div>
    </div>

<div class='row-fluid'>
<div class='span4'>


<div class="thumbnail">
    <h4 class="btn">Page Variables</h4>
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
</div>