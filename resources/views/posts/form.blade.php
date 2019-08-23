<div class="form-group">
    <label for="title">Title</label>
    {!! Form::text('title', null , [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="content">content</label>
    {!! Form::textarea('content', null , [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="image">Image</label>
    {!! Form::file('image', null, [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="category_id">Category Id</label>
    {!! Form::select('category_id',App\Models\Category::pluck('name', 'id') , old('category_id'),
     ['class'=>'form-control', 'placeholder' => '..............']) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>