@extends("hanakivan::layout")
@section("main")
    <div class="container">

        @if(isset($success) && !empty($success))
            <div class="alert alert-success">{{$success}}</div>
        @endif

        @if(isset($error) && !empty($error))
            <div class="alert alert-danger">{{$error}}</div>
        @endif

        <h1>Logs</h1>

        <ol class="breadcrumb">
            <li><a href="{{route("hanakivan.logviewer.list")}}">Logs</a></li>
            @if($path)
                <li><a href="{{route("hanakivan.logviewer.list", ["path" => $path])}}">{{trim($path, '\/')}}</a></li>
            @endif
            @if($name)
                <li><a href="{{route("hanakivan.logviewer.list", ["path" => $path, "name" => $name])}}">{{$name}}</a></li>
            @endif
        </ol>

        @if($contents)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="display: flex; align-items: center; justify-content: space-between">
                        <span>{{$name}}</span>
                        <div>
                            <a class="btn btn-link" href="{{/*route("admin.logs.download", ["path" => \App\Library\EncryptDecryptLibrary::encrypt($curlog)])*/""}}">
                                <span class="glyphicon glyphicon-download"></span>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <pre style="font-size: 11px; line-height: 1.8; white-space: break-spaces;">{{$contents}}</pre>
                </div>
            </div>
        @endif

        <table class="table table-bordered table-hover" style="table-layout: fixed;">
            <thead>
            <tr>
                <th width="100">Type</th>
                <th>Name</th>
                <th width="100">Size</th>
                <th width="150">Created</th>
                <th width="150">Modified</th>
            </tr>
            </thead>
            <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>
                        @if($log["type"] === "dir")
                            <span class="glyphicon glyphicon-folder-open"></span>
                        @else
                            <span class="glyphicon glyphicon-file"></span>
                        @endif
                        &nbsp;
                        {{$log["type"]}}
                    </td>
                    <td>
                        @if($log["type"] === "dir")
                            <a href="{{route("hanakivan.logviewer.list",[ "path" => $log["path"]])}}" style="color: black">
                                {{$log["name"]}}
                            </a>
                        @else
                            <a href="{{route("hanakivan.logviewer.list", ["name" => $log["name"], "path" => $path])}}">
                                @if($log["name"] === $name)
                                    <strong style="color: #005e8d;">&middot; {{$log["name"]}}</strong>
                                @else
                                    {{$log["name"]}}
                                @endif
                            </a>
                        @endif
                    </td>
                    <td>
                        @if(isset($log["filesize"]))
                            {{$log["filesize"]}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($log["type"] === "file")
                            {{(new \Carbon\Carbon(filectime($log["fullpath"])))->setTimezone(new DateTimeZone("Europe/Bratislava"))->format(\hanakivan\DateFormats::DATETIME_FORMAT)}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($log["type"] === "file")
                            {{(new \Carbon\Carbon(filemtime($log["fullpath"])))->setTimezone(new DateTimeZone("Europe/Bratislava"))->format(\hanakivan\DateFormats::DATETIME_FORMAT)}}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="alert alert-warning">
                            No logs here.
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
