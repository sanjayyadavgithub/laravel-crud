<html>
    <head>
        <title>Laravel crud Operations</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div class="p-3 mb-2 bg-dark text-white">
            <div class="container">
                <div class="h3">Laravel Crud Application</div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-white mb-3">
                    <a href={{url('/articles')}} class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Articles/edit</h4></div>
                        <div class="card-body">
                            <form action{{url('/articles/edit/'.$article->id)}} method="post" name="editArticles" id="editArticles">
                               @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" id="title" value="{{old('title',$article->title)}}" class="form-control {{($errors->any() && $errors->first('title'))?'is-invalid':''}}"/>
                                    @if($errors->any())
                                       <p class="invalid-feedback">{{$errors->first('title')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" col="30" row="10" class="form-control form-control {{($errors->any() && $errors->first('description'))?'is-invalid':''}}" value="{{old('description',$article->description)}}"></textarea>
                                    @if($errors->any())
                                       <p class="invalid-feedback">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Author</label>
                                    <input type="text" name="author" id="author" value="{{old('author',$article->author)}}" class="form-control form-control {{($errors->any() && $errors->first('author'))?'is-invalid':''}}"/>
                                    @if($errors->any())
                                       <p class="invalid-feedback">{{$errors->first('author')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
