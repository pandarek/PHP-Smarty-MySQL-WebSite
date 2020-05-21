{include file="header.tpl"}

    <p class="pubDate">Data publikacji {$article->publishDate|date_format}</p>
    <h1 class="pb-4">{$article->title}</h1>
    <div>{$article->intro}</div>
    <div>{$article->content}</div>
    <p><a href="./">Powrót</a></p>

{include file="footer.tpl"}