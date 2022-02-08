<?php

namespace hanakivan\LaravelLogViewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaravelLogViewerController extends Controller
{
    public function logviewer(Request $request)
    {
        $path = (string)$request->input("path");
        $name = (string)$request->input("name");

        $basePath = storage_path("logs");
        $logs = glob($basePath."$path/*");

        $contents = "";
        $curLog = $basePath."$path/$name";

        if(file_exists($curLog) && is_file($curLog)) {
            $contents = file_get_contents($basePath."$path/$name");
            $parsedContents = explode("\n", $contents);

            $parsedContents = implode("\n\n", $parsedContents);
            $contents = $parsedContents;
        }

        $logs = array_map(function ($item) use($basePath)  {
            if(is_dir($item)) {
                return [
                    "type" => "dir",
                    "path" => str_replace($basePath, "", $item),
                    "name" => basename($item),
                ];
            } else {
                return [
                    "type" => "file",
                    "name" => basename($item),
                    "fullpath" => $item,
                    "filesize" => self::aldeva_human_filesize(filesize($item)),
                ];
            }
        }, $logs);

        return view("hanakivan::list", [
            "logs"=> $logs,
            "path" => $path,
            "name" => $name,
            "contents"=> $contents,
            "curlog" => $curLog,
            "success"=> $request->input("success"),
            "error"=> $request->input("error"),
        ]);
    }

    private static function aldeva_human_filesize($bytes, $dec = 2)
    {
        $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . " ". @$size[$factor];
    }
}
