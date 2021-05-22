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
                    <a href={{url('/articles/add')}} class="btn btn-primary">ADD</a>
                </div>
                @if(Session::has('msg'))
                    <div class="col-md-12">
                        <div class="alert alert-success">{{Session::get('msg')}}</div>
                    </div>
                @endif

                 @if(Session::has('errorMsg'))
                    <div class="col-md-12">
                        <div class="alert alert-danger">{{Session::get('errorMsg')}}</div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Articles/List</h4></div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Author</th>
                                        <th>Created</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @if($articles)
                                    @foreach($articles as $article)
                                    <tr>
                                            <th>{{$article->id}}</th>
                                            <th>{{$article->title}}</th>
                                            <th>{{$article->description}}</th>
                                            <th>{{$article->author}}</th>
                                            <th>{{$article->created_at}}</th>
                                            <th><a href="{{url('articles/edit/'.$article->id)}}" class="btn btn-primary">Edit</a></th>
                                            <th><a href="#" onclick="deleteArticle({{$article->id}})" class="btn btn-danger">Delete</a></th>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                   <td colspan="6">Articles not added yet </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
   function deleteArticle(id){
       if(confirm('Are you sure you want to delete')){
           window.location.href='{{url('articles/delete')}}/'+id;
       }
   }
</script>