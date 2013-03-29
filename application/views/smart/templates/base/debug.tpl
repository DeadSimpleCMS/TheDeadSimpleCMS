<br>
<div class="debug-container">
<div class='debug-formatted'>
    <h6>Debug = true</h6>
    <br>
<ul>
{foreach from=$data key=key item=value}
<li><pre>{$key}: {$value}</pre></li>
{/foreach}

    </ul>
</div>
</div>