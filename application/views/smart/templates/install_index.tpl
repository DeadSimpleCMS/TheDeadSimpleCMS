<h1>{$data['install']->name} {$data['install']->baseurl}</h1>
<form method="post" action="/install">
    <input type="text" name="siteName" value="DeadSimpleCMS"/>
    <input type="text" name="baseUrl" value="nginx.internal"/>
    <input type="submit" name="submit" value="Submit" />
</form>