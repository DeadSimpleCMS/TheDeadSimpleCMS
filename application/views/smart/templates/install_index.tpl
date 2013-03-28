<h1>{$data['install']->name} {$data['install']->baseurl}</h1>
<br>
<form method="post" action="/install">
    <input type="text" name="siteName" value="DeadSimpleCMS"/>
    <input type="text" name="baseUrl" value="nginx.internal"/>
    <input type="submit" name="submitBase" value="Save" />
</form>
<br>

<ul>
    {foreach from=$data['navLinks'] item=link}
        <li><a href="{$link.url}"> {$link.linkName}</a></li>
    {/foreach}
</ul>

<form method="post" action="/install">
    <input type="text" name="url" value="/home"/>
    <input type="text" name="linkName" value="home"/>
    <input type="text" name="linkOrder" value="1"/>
    <input type="submit" name="submitLinks" value="Save" />
</form>