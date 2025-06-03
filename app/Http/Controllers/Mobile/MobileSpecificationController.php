<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MobileSpecificationRequest;
use App\Models\Mobile;
use App\Models\MobileSpecification;
use App\Services\Mobile\MobileSpecificationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MobileSpecificationController extends Controller
{
    protected $mobileSpecificationService;

    public function __construct(MobileSpecificationService $mobileSpecificationService)
    {
        $this->mobileSpecificationService = $mobileSpecificationService;
    }

    private function viewForRole(string $adminView, string $agentView, array $data = [])
    {
        return Auth::user()->hasRole('admin')
            ? view($adminView, $data)
            : view($agentView, $data);
    }

    public function specification($id)
    {
        try {
            $data = $this->mobileSpecificationService->specification($id);
            $specification = $data['specification'];
            $mobile = $data['mobile'];

            return $this->viewForRole(
                'dashboard.mobile.display.mobile_specification',
                'dashboard-agent.mobile.display.mobile_specification',
                compact('specification', 'mobile')
            );

        } catch (ModelNotFoundException $e) {
            try {
                $mobile = $this->mobileSpecificationService->addSpecification($id); // تأكد من تعديل اسم الدالة في الـService أيضًا

                return $this->viewForRole(
                    'dashboard.mobile.display.mobile_specification',
                    'dashboard-agent.mobile.mobile_specification',
                    compact('mobile')
                );
            } catch (ModelNotFoundException $e) {
                abort(404, $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('Error showing mobile specification: ' . $e->getMessage());
            abort(500);
        }
    }

    public function createSpecification($id)
    {
        try {
            $mobile = $this->mobileSpecificationService->createSpecification($id);

            return $this->viewForRole(
                'dashboard.mobile.create.createSpecification',
                'dashboard-agent.mobile.create.createSpecification',
                compact('mobile')
            );

        } catch (ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error showing mobile specification form: ' . $e->getMessage());
            abort(500);
        }
    }

    public function store(MobileSpecificationRequest $request)
    {
        $this->mobileSpecificationService->store($request);

        $successMessage = 'Mobile specification was added successfully.';

        // إذا لم تكن هناك description موجودة، انتقل لإضافة الوصف
        if (empty($mobile->description)) {
            return $this->viewForRole(
                'dashboard.mobile.create.createDescription',
                'dashboard-agent.mobile.create.createDescription',
            )->with('success', $successMessage);
        }

        // إذا كل شيء مكتمل، عد للقائمة
        return Auth::user()->hasRole('admin')
            ? redirect()->route('admin.mobiles.index')->with('success', $successMessage)
            : redirect()->route('agent.mobiles.index')->with('success', $successMessage);
    }

    public function edit($id)
    {
        $specification = MobileSpecification::findOrFail($id);
        $mobile = Mobile::findOrFail($specification->mobile_id);
        $this->authorize('update',$mobile);
        return $this->viewForRole(
            'dashboard.mobile.update.updateSpecification',
            'dashboard-agent.mobile.update.updateSpecification',
            compact('specification')
        );
    }

    public function update(MobileSpecificationRequest $request, $id)
    {
        $this->mobileSpecificationService->update($request, $id);
        $route = Auth::user()->hasRole('admin') ? 'admin.mobiles.index' : 'agent.mobiles.index';
        return redirect()->route($route)->with('success', 'Mobile specification updated successfully.');
    }

    public function destroy(string $id)
    {
        // Not implemented yet
    }
}
