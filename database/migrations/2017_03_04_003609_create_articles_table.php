<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->comment('分类');
            $table->integer('user_id')->unsigned()->comment('作者');
            $table->integer('last_user_id')->unsigned()->nullable()->comment('最后评论的用户');
            $table->string('slug')->nullable()->comment('标识');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->text('content')->comment('文章正文');
            $table->string('page_image')->nullable()->comment('文章图片');
            $table->string('meta_description')->nullable()->comment('description');
            $table->boolean('is_original')->default(false)->comment('是否原创');
            $table->boolean('is_draft')->default(false)->comment('是否草稿');
            $table->integer('view_count')->unsigned()->default(0)->index()->comment('阅读次数');
            $table->timestamp('published_at')->nullable()->comment('定期发布时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
