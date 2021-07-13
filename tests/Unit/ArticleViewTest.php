<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArticleViewTest extends TestCase
{
    public function testClassArticleView()
    {
        $this->assertTrue(class_exists("ArticleView"));
    }

    public function testClassArticleViewCanBeInstatiated()
    {
      $article['id'] = 1;
      $article['mainTitle'] = "Lorem Ipsum";
      $article['publishDate'] = "2021-01-02";
      $article['authorName'] = "Carl Bernstein";
      $article['text'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

      $aritlce['article'] = $article;

      $object = new ArticleView($aritlce);
      $this->assertInstanceOf(ArticleView::class, $object);	
    }

    public function testEmptyArticleThrowsException()
    {
      $this->expectException(InvalidArgumentException::class);

      $object = new ArticleView([]);
      $this->assertInstanceOf(ArticleView::class, $object);	
    }
}
?>