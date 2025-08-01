<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ThesisController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ArticleHtmlController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['XSS'])->group(function () {
    // Home Route
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home.page');
    Route::get('/search-result', 'HomeController@search')->name('search-result');

    Route::get('/academic-journal', 'HomeController@dissertation_thesis')->name('academic.journal');
    Route::get('/books', 'HomeController@books')->name('books');
    Route::get('/conferences', 'HomeController@conferences')->name('conferences');
    Route::get('/dissertation-thesis', 'HomeController@thesis')->name('dissertation.thesis');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/announcements', 'HomeController@announcements')->name('announcements');
    Route::get('/journal/{slug}/{id}', 'HomeController@journal')->name('journal.show');
    Route::get('/dissertation-publish', 'HomeController@desirtation_publish')->name('dissertation.publish');
    Route::get('/dissertation-faq', 'HomeController@dissertation_faq')->name('dissertation.faq');
    Route::get('/dissertation-promote', 'HomeController@dissertation_promote')->name('dissertation.promote');
    Route::get('/book-promote', 'HomeController@book_promote')->name('book.promote');
    Route::get('/books/{id}', [BookController::class, 'details'])->name('book.details');


    Route::get('/book-faq', 'HomeController@book_faq')->name('book.faq');

    Route::get('/book-publish', 'HomeController@book_publish')->name('book.publish');

    Route::get('/booklist', [BookController::class, 'index'])->name('bookList.index');
    Route::get('/books/category/{id}', [BookController::class, 'category'])->name('books.category');

    Route::get('/thesislist', [ThesisController::class, 'index'])->name('thesis.index');
    Route::get('/thesiss/category/{id}', [ThesisController::class, 'category'])->name('thesis.category');
    Route::get('/thesis/{id}', [ThesisController::class, 'details'])->name('thesis.details');


    Route::get('contact/support', 'HomeController@contactSupport')->name('contact.support');

    Route::get('/mission/vission', 'HomeController@mission')->name('mission.vission');


    Route::get('/business/editorial/{id}', 'EditorialController@business_editorial')->name('business.editorial');
    Route::get('/best-paper-awards/{id}', 'EditorialController@best_paper')->name('best-paper-awards');

    Route::get('/helth-editorial', 'EditorialController@helth_editorial')->name('helth.editorial');
    Route::get('/Enterprenurship-marketing-editorial', 'EditorialController@journal_3')->name('journal_3');
    Route::get('/Advances-in-Machine-Learning', 'EditorialController@journal_4')->name('journal_4');
    Route::get('/Journal-of-Sustainable-Agricultural-Economics', 'EditorialController@journal_5')->name('journal_5');
    Route::get('/Multidisciplinary-Journal-on-Information-Technology-Management-and-Business-Magazine', 'EditorialController@journal_6')->name('journal_6');
    Route::get('/Demographic-Research-and-Social-Development-Reviews', 'EditorialController@journal_7')->name('journal_7');
    Route::get('/Transactions-on-Banking', 'EditorialController@journal_8')->name('journal_8');
    Route::get('/International-Law-Policy-Review-and-Organizational-Management', 'EditorialController@journal_9')->name('journal_9');
    Route::get('/Journal-of-Information-Technology-Management-and-Business-Horizons', 'EditorialController@journal_10')->name('journal_10');

    Route::get('/current-issue/{id}', 'PageController@current_issue')->name('current.issue');

    Route::get('/current-issue/{id}/current_issue_list/{volumeId}', 'PageController@current_issue_list')->name('current.issue.list');

    // Route::get('/current-issue/{id}/current_issue_list/{volumeId}/issu-details/{issueId}', 'PageController@single_issue')->name('single.issue');
    // Route::get('/current-issue/{id}/current_issue_list/{volumeId}/issu-details/{issueId}', 'PageController@article_issue')->name('article.issue');
    Route::get('/{id}/{volumeId}/{issueId}/issue/article={article?}', 'PageController@single_issue')->name('single.issue');


    Route::get('/current-issue/{id}/current_issue_list/{volumeId}/issue-articles/{issueId}', 'PageController@article_issue')->name('article.issue');


    Route::get('/submission/{id}', 'SubmissionController@submission')->name('submission');

    Route::get('/article-press/{id}', 'PageController@article_press')->name('article-press');
    Route::get('/special-issue/{id}', 'PageController@special_issue')->name('special-issue');
    Route::get('/all-issue/{id}', 'PageController@all_issue')->name('all-issue');

    Route::get('/journal-overview/{id}', 'PageController@journal_overview')->name('journal-overview');
    Route::get('/language-editing-service/{id}', 'PageController@language_editing_service')->name('language-editing-service');

    Route::get('/call-for-papers/{id}', 'PageController@call_for_papers')->name('call-for-papers');
    Route::get('/guide-for-aurthors/{id}', 'PageController@guide_for_aurthors')->name('guide-for-aurthors');

    //Email Subscriber
    Route::post('/email-Subscribe', 'PageController@subscriber')->name('email.post');


    // Article Routes
    Route::get('/home-news', 'PageController@news')->name('home.news');
    Route::get('/newss/{id}', 'PageController@news_details')->name('news.details');
    Route::get('/home-article', 'PageController@article')->name('home.article');
    Route::get('/home-article-details/{id}', 'PageController@article_details')->name('article.details');
    Route::get('/home-papers', 'PageController@papers')->name('home.papers');
    Route::get('/home-blogs', 'PageController@blogs')->name('home.blogs');
    Route::get('/home-blog-details/{id}', 'PageController@blog_details')->name('blog.details');

    // Article Routes
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/article/category/{id}', 'ArticlesController@category');
    Route::get('/article/{id}', 'ArticlesController@show');

    // Comment Route
    Route::post('/article/comment', 'CommentController@store')->name('user.comment.store');

    // Requirement Route
    Route::get('/requirement', 'RequirementController@index');

    // Author Routes
    Route::get('/authors', 'AuthorController@index');
    Route::get('/author/{id}', 'AuthorController@show');

    // Search Route
    Route::get('/search', 'SearchController@index');

    // Contact Routes
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@sendMail');
});


// Auth Routes
Auth::routes();
//Auth::routes(['register' => false]);


// Auth Common Routes
Route::group(['middleware' => 'auth', 'XSS'], function () {
    // Dashboard Route
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
});


// Admin Routes
Route::group(['prefix' => 'dashboard/admin', 'middleware' => ['auth', 'isAdmin', 'XSS']], function () {
    //Banner Routes
    Route::get('banner', 'Admin\BannerController@index')->name('banner');
    Route::post('banner/store', 'Admin\BannerController@store')->name('banner.store');
    Route::get('/banners/{id}/edit', 'Admin\BannerController@edit')->name('banners.edit');
    Route::put('/banners/{id}', 'Admin\BannerController@update')->name('banners.update');
    Route::delete('/banners/{id}', 'Admin\BannerController@destroy')->name('banners.destroy');

    //Blog Routes
    Route::get('blog', 'Admin\BlogController@index')->name('blog');
    Route::post('blog/store', 'Admin\BlogController@store')->name('blog.store');
    Route::get('/blogs/{id}/edit', 'Admin\BlogController@edit')->name('blogs.edit');
    Route::put('/blogs/{id}', 'Admin\BlogController@update')->name('blog.update');
    Route::delete('/blogs/{id}', 'Admin\BlogController@destroy')->name('blogs.destroy');

    //News Routes
    Route::get('news', 'Admin\NewsController@index')->name('news');
    Route::post('news/store', 'Admin\NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit', 'Admin\NewsController@edit')->name('newss.edit');
    Route::put('/news/{id}', 'Admin\NewsController@update')->name('news.update');
    Route::delete('/news/{id}', 'Admin\NewsController@destroy')->name('news.destroy');


    //Blog Banner Routes
    Route::get('blog-banner', 'Admin\BlogBannerController@index')->name('blog_banner');
    Route::post('blog-banner/store', 'Admin\BlogBannerController@store')->name('blog.banner.store');
    Route::get('/blog-banner/{id}/edit', 'Admin\BlogBannerController@edit')->name('blog_banner.edit');
    Route::put('/blog-banner/{id}', 'Admin\BlogBannerController@update')->name('blog_banner.update');
    Route::delete('/blog-banner/{id}', 'Admin\BlogBannerController@destroy')->name('blog_banner.destroy');

    // Article Routes
    Route::resource('article-category', 'Admin\ArticleCategoryController');
    Route::get('article/approve', 'Admin\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Admin\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Admin\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Admin\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Admin\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Admin\ArticleController@destroy')->name('article.destroy');


    // Issue Routes
    Route::get('issue/{id}', 'Admin\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Admin\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Admin\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Admin\ArticleIssueController@destroy')->name('issue.destroy');

    //Journal Routes
    Route::get('Journal', 'Admin\JournalController@index')->name('journal.index');
    Route::get('Journal-create', 'Admin\JournalController@create')->name('journal.create');
    Route::post('Journal-store', 'Admin\JournalController@store')->name('journal.store');
    Route::get('/journal/{id}/edit', 'Admin\JournalController@edit')->name('journal.edit');
    Route::put('/journal/{id}', 'Admin\JournalController@update')->name('journal.update');
    Route::delete('/journal-destroy/{id}', 'Admin\JournalController@destroy')->name('journal.destroy');


    //Editorial Route
    Route::get('editorial', 'Admin\EditorialController@index')->name('journal.editorial');
    Route::get('editorial-create', 'Admin\EditorialController@create')->name('editorial.create');
    Route::post('editorial-store', 'Admin\EditorialController@store')->name('editorial.store');
    Route::get('/editorial/{id}/edit', 'Admin\EditorialController@edit')->name('editorial.edit');
    Route::put('/editorial/{id}', 'Admin\EditorialController@update')->name('editorial.update');
    Route::delete('/editorial-destroy/{id}', 'Admin\EditorialController@destroy')->name('editorial.destroy');

    //Best Paper Awards Route
    Route::get('award', 'Admin\BestPaperAwardController@index')->name('journal.award');
    Route::get('award-create', 'Admin\BestPaperAwardController@create')->name('award.create');
    Route::post('award-store', 'Admin\BestPaperAwardController@store')->name('award.store');
    Route::get('/award/{id}/edit', 'Admin\BestPaperAwardController@edit')->name('award.edit');
    Route::put('/award/{id}', 'Admin\BestPaperAwardController@update')->name('award.update');
    Route::delete('/award-destroy/{id}', 'Admin\BestPaperAwardController@destroy')->name('award.destroy');

    // Article HTML
    Route::resource('article-html', ArticleHtmlController::class);

    // Other Routes
    Route::resource('requirement', 'Admin\RequirementController');
    Route::resource('reviewer', 'Admin\ReviewerController');
    Route::resource('author', 'Admin\AuthorController');

    // Comment Route
    Route::resource('comment', 'Admin\CommentController');

    // Profile Route
    Route::resource('profile', 'Admin\ProfileController');

    // Setting Routes
    Route::get('setting', 'Admin\SettingController@index')->name('setting.index');
    Route::post('siteinfo', 'Admin\SettingController@siteInfo')->name('setting.siteinfo');
    Route::post('contactinfo', 'Admin\SettingController@contactInfo')->name('setting.contactinfo');
    Route::post('socialinfo', 'Admin\SettingController@socialInfo')->name('setting.socialinfo');
    Route::post('changemail', 'Admin\SettingController@changeMail')->name('setting.changemail');
    Route::post('changepass', 'Admin\SettingController@changePass')->name('setting.changepass');
});


// Author Routes
Route::group(['prefix' => 'dashboard/reviewer', 'as' => 'reviewer.', 'middleware' => ['auth', 'isReviewer', 'XSS']], function () {
    // Article Routes
    Route::get('article/approve', 'Reviewer\ArticleController@approve')->name('article.approve');
    Route::get('article/pending', 'Reviewer\ArticleController@pending')->name('article.pending');
    Route::get('article/reject', 'Reviewer\ArticleController@reject')->name('article.reject');
    Route::post('article', 'Reviewer\ArticleController@store')->name('article.store');
    Route::put('article/{id}', 'Reviewer\ArticleController@update')->name('article.update');
    Route::delete('article/{id}', 'Reviewer\ArticleController@destroy')->name('article.destroy');

    // Issue Routes
    Route::get('issue/{id}', 'Reviewer\ArticleIssueController@index')->name('issue.index');
    Route::post('issue', 'Reviewer\ArticleIssueController@store')->name('issue.store');
    Route::put('issue/{id}', 'Reviewer\ArticleIssueController@update')->name('issue.update');
    Route::delete('issue/{id}', 'Reviewer\ArticleIssueController@destroy')->name('issue.destroy');

    // Profile Route
    Route::resource('profile', 'Reviewer\ProfileController');
});


// Author Routes
Route::group(['prefix' => 'dashboard/author', 'as' => 'author.', 'middleware' => ['auth', 'isAuthor', 'XSS']], function () {
    // Article Routes
    Route::resource('article', 'Author\ArticleController');

    // Issue Routes
    Route::resource('issue', 'Author\ArticleIssueController');

    // Profile Route
    Route::resource('profile', 'Author\ProfileController');
});

//pdf_book
Route::get('/pdf_view', function (Illuminate\Http\Request $request) {
    $file = $request->query('file');
    return view('pdf_view', ['file' => $file]);
})->name('pdf_view');
//pdf thesis
Route::get('/pdf_view_thesis', function (Illuminate\Http\Request $request) {
    $file = $request->query('file');
    return view('pdf_view_thesis', ['file' => $file]);
})->name('pdf_view_thesis');


Route::get('pdf_view_journal', function (Illuminate\Http\Request $request) {
    $file = $request->query('file');
    return view('journal_pdf_view', ['file' => $file]);
})->name('pdf_view_journal');



Route::get('/download-pdf', function (Request $request) {
    $file = $request->query('file');

    // Define full path to the PDF file
    $filePath = public_path('public/journalPdf/' . $file);

    // Check if file exists
    if (!file_exists($filePath)) {
        return abort(404, 'File not found.');
    }

    // Load the existing PDF file
    $pdfContent = file_get_contents($filePath);

    // Return PDF as download
    return response($pdfContent, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $file . '"',
    ]);
})->name('download_pdf');



Route::get('/article-view/{filename}', function ($filename) {
    $path = public_path('public/articlehtml/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('article.view');
