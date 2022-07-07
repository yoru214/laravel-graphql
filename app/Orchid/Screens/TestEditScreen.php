<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Test;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;

class TestEditScreen extends Screen
{
    public $test;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Test $test): iterable
    {
        return [
            'test' => $test
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->test->exists ? 'Edit test' : 'Creating a new test';
    }
    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Tests";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create test')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->test->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->test->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->test->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('test.name')
                    ->title('Name')
                    ->placeholder('Name of the test')
                    ->help('Specify a short descriptive title for this post.'),

                TextArea::make('test.description')
                    ->title('Description')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Brief description of the test'),

                Input::make('test.category')
                    ->title('Category')
                    ->placeholder('Category of the test')
                    ->help('Category where the test is grouped to'),

            ])
        ];
    }
    

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Test $test, Request $request)
    {
        $test->fill($request->get('test'))->save();

        Alert::info('You have successfully created an test.');

        return redirect()->route('platform.test.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Test $test)
    {
        $test->delete();

        Alert::info('You have successfully deleted the test.');

        return redirect()->route('platform.test.list');
    }
}
