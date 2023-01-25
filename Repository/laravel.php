<?php

//And so let’s create our PostRepositoryInterface in the app/Interfaces/ folder

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function list();
    public function findById(int $postId);
    public function create(array $details);
    public function update(int $postId, array $details);
    public function delete(int $postId);
}

//And now let’s create the PostRepository in the app/Repositories folder which will implements the PostRepositoryInterface

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function list()
    {
        return Post::all();
    }

    public function findById(int $postId)
    {
        return Post::query()->findOrFail($postId);
    }

    public function create(array $details)
    {
        return Post::create($details);
    }

    public function update(int $postId, array $details)
    {
        return Post::query()->where('id', $postId)->update($details);
    }

    public function delete(int $postId)
    {
        return Post::query()->where('id', $postId)->delete();
    }
}

//Next in our class, through dependency injection, we use our PostRepositoryInterface

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostCreateRequest;
use App\Http\Requests\Api\PostUpdateRequest;
use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function list()
    {
        return $this->postRepository->list();
    }

    public function findById(int $postId)
    {
        return $this->postRepository->findById($postId);
    }

    public function create(PostCreateRequest $request)
    {
        return $this->postRepository->create($request->validated());
    }

    public function update(PostUpdateRequest $request, int $postId)
    {
        return $this->postRepository->update($postId, $request->validated());
    }

    public function delete(int $postId)
    {
        return $this->postRepository->delete($postId);
    }
}

/*
 *
 * But in order for PostRepositoryInterface to refer to PostRepository we need to bind the interface to the repository.

Go to the command line and run the following command at the root of the application to create a RepositoryServiceProvider.

php artisan make:provider RepositoryServiceProvider
// Provider created successfully.
And this command should create a file RepositoryServiceProvider.php in the app/Providers.

Inside the RepositoryServiceProvider class, in the register() method, we will bind the interface to the repository. We will also bind all our other interfaces to repositories in this provider.
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        // $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}