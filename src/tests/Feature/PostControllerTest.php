<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class PostControllerTest extends TestCase
{
    public function setUp() {
        parent::setUp();
        
        DB::table('posts')->truncate();
        
        $files = glob(public_path('storage').'/*');
        foreach($files as $file){
          if(is_file($file)) unlink($file);
        }
    }

    public function test_GetIndex_WhenNoPosts_ShouldShowNothing() {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        $response->assertViewHas('posts', collect([]));
    }
    
    public function test_GetIndex_WhenOnePost_ShouldShowJustOnePost() {
        $post = new \App\Post([
            'title' => 'T',
            'subtitle' => 'ST',
            'second-title' => 'S2T',
            'content' => 'c',
            'image-path' => 'fake.jpeg',
            'created_at' => Carbon::today()
        ]);
        
        DB::table('posts')->insert($post->getData());
        
        $response = $this->get('/');
        
        $response->assertStatus(200);
        
        $data = $response->getOriginalContent()->getData();
        $this->assertTrue(isset($data['posts']));
        
        $posts = $data['posts'];
        $this->assertTrue(count($posts) == 1);
        
        $this->assertEquals($post->getTitle(), $posts[0]->getTitle());
        $this->assertEquals($post->getSubtitle(), $posts[0]->getSubtitle());
        $this->assertEquals($post->getSecondTitle(), $posts[0]->getSecondTitle());
        $this->assertEquals($post->getContent(), $posts[0]->getContent());
        $this->assertEquals($post->getData()['image-path'], $posts[0]->getData()['image-path']);
        $this->assertEquals($post->getData()['created_at'], $posts[0]->getData()['created_at']);
        
    }
    
    public function test_GetIndex_WhenManyPosts_ShouldShowAllPostsOrdered() {
        $post1 = new \App\Post([
            'title' => 'T1',
            'subtitle' => 'ST1',
            'second-title' => 'S2T1',
            'content' => 'c1',
            'image-path' => 'fake1.jpeg',
            'created_at' => Carbon::today()
        ]);
        $post2 = new \App\Post([
            'title' => 'T2',
            'subtitle' => 'ST2',
            'second-title' => 'S2T2',
            'content' => 'c2',
            'image-path' => 'fake2.jpeg',
            'created_at' => Carbon::yesterday()
        ]);
        $post3 = new \App\Post([
            'title' => 'T3',
            'subtitle' => 'ST3',
            'second-title' => 'S2T3',
            'content' => 'c3',
            'image-path' => 'fake3.jpeg',
            'created_at' => Carbon::tomorrow()
        ]);
        
        DB::table('posts')->insert($post1->getData());
        DB::table('posts')->insert($post2->getData());
        DB::table('posts')->insert($post3->getData());
        
        $response = $this->get('/');
        
        $response->assertStatus(200);
        
        $data = $response->getOriginalContent()->getData();
        $this->assertTrue(isset($data['posts']));
        
        $posts = $data['posts'];
        $this->assertTrue(count($posts) == 3);
        
        $this->assertEquals($post1->getTitle(), $posts[1]->getTitle());
        $this->assertEquals($post1->getSubtitle(), $posts[1]->getSubtitle());
        $this->assertEquals($post1->getSecondTitle(), $posts[1]->getSecondTitle());
        $this->assertEquals($post1->getContent(), $posts[1]->getContent());
        $this->assertEquals($post1->getData()['image-path'], $posts[1]->getData()['image-path']);
        $this->assertEquals($post1->getData()['created_at'], $posts[1]->getData()['created_at']);
        
        $this->assertEquals($post2->getTitle(), $posts[2]->getTitle());
        $this->assertEquals($post2->getSubtitle(), $posts[2]->getSubtitle());
        $this->assertEquals($post2->getSecondTitle(), $posts[2]->getSecondTitle());
        $this->assertEquals($post2->getContent(), $posts[2]->getContent());
        $this->assertEquals($post2->getData()['image-path'], $posts[2]->getData()['image-path']);
        $this->assertEquals($post2->getData()['created_at'], $posts[2]->getData()['created_at']);
        
        $this->assertEquals($post3->getTitle(), $posts[0]->getTitle());
        $this->assertEquals($post3->getSubtitle(), $posts[0]->getSubtitle());
        $this->assertEquals($post3->getSecondTitle(), $posts[0]->getSecondTitle());
        $this->assertEquals($post3->getContent(), $posts[0]->getContent());
        $this->assertEquals($post3->getData()['image-path'], $posts[0]->getData()['image-path']);
        $this->assertEquals($post3->getData()['created_at'], $posts[0]->getData()['created_at']);
    }

    public function test_PostCreate_WhenImageNotSent_ShouldFail()
    {
        $response = $this->post('/admin');

        $response->assertStatus(302);
        $response->assertSessionHasErrors('image');
    }
    
    public function test_PostCreate_WhenFileSentIsNotImage_ShouldFail()
    {
        $response = $this->post('/admin', [
            'image' => UploadedFile::fake()->create('fake.pdf', 150)
        ]);
        
        $response->assertStatus(302);
        $response->assertSessionHasErrors('image');
    }
    
    public function test_PostCreate_WhenValidImageSentButFieldsNotFilled_ShouldFail()
    {
        $response = $this->post('/admin', [
            'image' => UploadedFile::fake()->image('fake.jpg')
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title', 'subtitle', 'second-title', 'content']);
    }
    
    public function test_PostCreate_WhenDataIsValid_ShouldSavePost()
    {
        $title = 'Title';
        $subtitle = 'Subtitle';
        $secondTitle = 'Second Title';
        $content = 'Content';
        $image = UploadedFile::fake()->image('fake.jpg');
        
        $response = $this->post('/admin', [
            'title' => $title,
            'subtitle' => $subtitle,
            'second-title' => $secondTitle,
            'content' => $content,
            'image' => $image
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', [
            'title' => $title,
            'subtitle' => $subtitle,
            'second-title' => $secondTitle,
            'content' => $content
        ]);
        
        $files = glob(public_path('storage').DIRECTORY_SEPARATOR.'*'.md5($title).'*.jpeg');
        $this->assertTrue(strpos($files[0], 'desktop') != false);
        $this->assertTrue(strpos($files[1], 'mobile') != false);
        $this->assertTrue(strpos($files[2], 'tablet') != false);
        
    }
}
