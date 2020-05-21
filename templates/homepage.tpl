<div class="blog-main">
    {foreach $articles as $article}
        <div class="blog-post">
            <span class="pubDate">{$article.publishDate|date_format}</span>
            <h2 class="blog-post-title">
                <a href=".?action=viewArticle&amp;articleId={$article.id}">{$article.title}</a>
            </h2>
            <p class="summary">{$article.intro}</p>
            <a href=".?action=viewArticle&amp;articleId={$article.id}">Czytaj więcej -></a>
        </div>
        <hr>
    {/foreach}
</div>