<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\ResponseFormatter;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $folders = Folder::entities($request->entities)->whereNull('parent_id')->get();

            return ResponseFormatter::success($folders);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ResponseFormatter::error('Error Model: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\Illuminate\Database\QueryException $e) {
            return ResponseFormatter::error('Error Query: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\ErrorException $e) {
            return ResponseFormatter::error('Error Exception: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (RouteNotFoundException $e) {
            return ResponseFormatter::error('Route not found: ' . (env('APP_DEBUG', false) ? $e : ''), 404);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseFormatter::error('Token is invalid: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseFormatter::error('Token has expired: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseFormatter::error('JWT error: ' . (env('APP_DEBUG', false) ? $e : ''), 401);
        } catch (\Exception $e) {
            return ResponseFormatter::error('Unexpected Error: ' . (env('APP_DEBUG', false) ? $e : ''));
        }
    }

    public function get_child_document(Request $request, string $document_id)
    {
        try {
            $folders = Folder::where('id', $document_id)->entities($request->entities)->first();
            return ResponseFormatter::success($folders);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ResponseFormatter::error('Error Model: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\Illuminate\Database\QueryException $e) {
            return ResponseFormatter::error('Error Query: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\ErrorException $e) {
            return ResponseFormatter::error('Error Exception: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (RouteNotFoundException $e) {
            return ResponseFormatter::error('Route not found: ' . (env('APP_DEBUG', false) ? $e : ''), 404);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseFormatter::error('Token is invalid: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseFormatter::error('Token has expired: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseFormatter::error('JWT error: ' . (env('APP_DEBUG', false) ? $e : ''), 401);
        } catch (\Exception $e) {
            return ResponseFormatter::error('Unexpected Error: ' . (env('APP_DEBUG', false) ? $e : ''));
        }
    }

    public function store(Request $request)
    {
        try {
            $folder = new Folder();
            $folder->name = $request->name;
            $folder->icon = $request->icon;
            $folder->is_open = false;
            $folder->parent_id = $request->parent_id;
            $folder->save();

            return ResponseFormatter::success($folder);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ResponseFormatter::error('Error Model: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\Illuminate\Database\QueryException $e) {
            return ResponseFormatter::error('Error Query: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\ErrorException $e) {
            return ResponseFormatter::error('Error Exception: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (RouteNotFoundException $e) {
            return ResponseFormatter::error('Route not found: ' . (env('APP_DEBUG', false) ? $e : ''), 404);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseFormatter::error('Token is invalid: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseFormatter::error('Token has expired: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseFormatter::error('JWT error: ' . (env('APP_DEBUG', false) ? $e : ''), 401);
        } catch (\Exception $e) {
            return ResponseFormatter::error('Unexpected Error: ' . (env('APP_DEBUG', false) ? $e : ''));
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $folder = Folder::findOrFail($id);
            $folder->name = $request->name;
            $folder->save();

            return ResponseFormatter::success($folder);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ResponseFormatter::error('Error Model: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\Illuminate\Database\QueryException $e) {
            return ResponseFormatter::error('Error Query: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\ErrorException $e) {
            return ResponseFormatter::error('Error Exception: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (RouteNotFoundException $e) {
            return ResponseFormatter::error('Route not found: ' . (env('APP_DEBUG', false) ? $e : ''), 404);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseFormatter::error('Token is invalid: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseFormatter::error('Token has expired: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseFormatter::error('JWT error: ' . (env('APP_DEBUG', false) ? $e : ''), 401);
        } catch (\Exception $e) {
            return ResponseFormatter::error('Unexpected Error: ' . (env('APP_DEBUG', false) ? $e : ''));
        }
    }

    public function delete(string $id)
    {
        try {
            $folder = Folder::findOrFail($id);
            $folder->delete();

            return ResponseFormatter::success($folder);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return ResponseFormatter::error('Error Model: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\Illuminate\Database\QueryException $e) {
            return ResponseFormatter::error('Error Query: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (\ErrorException $e) {
            return ResponseFormatter::error('Error Exception: ' . (env('APP_DEBUG', false) ? $e : ''));
        } catch (RouteNotFoundException $e) {
            return ResponseFormatter::error('Route not found: ' . (env('APP_DEBUG', false) ? $e : ''), 404);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseFormatter::error('Token is invalid: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseFormatter::error('Token has expired: ' . $e, 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseFormatter::error('JWT error: ' . (env('APP_DEBUG', false) ? $e : ''), 401);
        } catch (\Exception $e) {
            return ResponseFormatter::error('Unexpected Error: ' . (env('APP_DEBUG', false) ? $e : ''));
        }
    }
}
