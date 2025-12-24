<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["ViewAny:Role","View:Role","Create:Role","Update:Role","Delete:Role","Restore:Role","ForceDelete:Role","ForceDeleteAny:Role","RestoreAny:Role","Replicate:Role","Reorder:Role","ViewAny:Disease","View:Disease","Create:Disease","Update:Disease","Delete:Disease","Restore:Disease","ForceDelete:Disease","ForceDeleteAny:Disease","RestoreAny:Disease","Replicate:Disease","Reorder:Disease","ViewAny:MedicalRecord","View:MedicalRecord","Create:MedicalRecord","Update:MedicalRecord","Delete:MedicalRecord","Restore:MedicalRecord","ForceDelete:MedicalRecord","ForceDeleteAny:MedicalRecord","RestoreAny:MedicalRecord","Replicate:MedicalRecord","Reorder:MedicalRecord","ViewAny:Rule","View:Rule","Create:Rule","Update:Rule","Delete:Rule","Restore:Rule","ForceDelete:Rule","ForceDeleteAny:Rule","RestoreAny:Rule","Replicate:Rule","Reorder:Rule","ViewAny:Symptom","View:Symptom","Create:Symptom","Update:Symptom","Delete:Symptom","Restore:Symptom","ForceDelete:Symptom","ForceDeleteAny:Symptom","RestoreAny:Symptom","Replicate:Symptom","Reorder:Symptom","ViewAny:User","View:User","Create:User","Update:User","Delete:User","Restore:User","ForceDelete:User","ForceDeleteAny:User","RestoreAny:User","Replicate:User","Reorder:User","View:WelcomeWidget","View:StatsOverview"]},{"name":"user","guard_name":"web","permissions":["ViewAny:MedicalRecord","View:MedicalRecord","Create:MedicalRecord","Update:MedicalRecord"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
