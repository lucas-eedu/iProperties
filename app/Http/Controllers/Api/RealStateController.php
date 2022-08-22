<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\RealStateRequest;
use App\Models\RealState;

class RealStateController extends Controller
{    
    /**
     * realState
     *
     * @var mixed
     */
    private $realState;

    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $realState = $this->realState->paginate(10);
        return response()->json($realState, 200);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        try {
            $realState = $this->realState->findOrFail($id);

            return response()->json(['data' => ['data' => $realState]], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(RealStateRequest $request)
    {
        try {
            $data = $request->all();
            $this->realState->create($data);

            return response()->json(['data' => ['msg' => 'Property registered successfully!']]);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
        
    }
    
    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
    public function update($id, RealStateRequest $request)
    {
        try {
            $data = $request->all();
            $realState = $this->realState->findOrFail($id);
            $realState->update($data);

            return response()->json(['data' => ['msg' => 'Property successfully updated!']], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $realState = $this->realState->findOrFail($id);
            $realState->delete();

            return response()->json(['data' => ['msg' => 'Property successfully removed!']], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
