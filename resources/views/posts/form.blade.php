@inject('category', 'App\Models\Category')
<div class="form-group">
    <label for="title">العنوان</label>
    {!! Form::text('title', null , [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="content">المحتوى</label>
    {!! Form::textarea('content', null , [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="image">الصوره</label>
    {!! Form::file('image', null, [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="category_id">القسم</label>
    {!! Form::select('category_id',$category->pluck('name', 'id') , old('category_id'),
     ['class'=>'form-control', 'placeholder' => '..............']) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>