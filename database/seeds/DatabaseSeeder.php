<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CurrenciesTableSeeder::class);
        $this->call(OperatingUnitTypesTableSeeder::class);
        $this->call(OperatingUnitsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(InterventionsTableSeeder::class);
        $this->call(ImplementationModesTableSeeder::class);
        $this->call(BasesTableSeeder::class);
        $this->call(FundingSourcesTableSeeder::class);
        // $this->call(ParadigmsTableSeeder::class);
        $this->call(SustainableDevelopmentGoalsTableSeeder::class);
        $this->call(TypologiesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        // $this->call(DistrictsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        // $this->call(UserRolesTableSeeder::class);
        $this->call(SpatialCoveragesTableSeeder::class);
        // $this->call(CostStructuresTableSeeder::class);
        // $this->call(OperatingUnitActivityTableSeeder::class);
        $this->call(TenPointAgendasTableSeeder::class);
        $this->call(TiersTableSeeder::class);
        $this->call(TechnicalReadinessesTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
        $this->call(ProcessingStatusesTableSeeder::class);
        $this->call(FundingInstitutionsTableSeeder::class);
        // $this->call(ProjectsTableSeeder::class);
        // $this->call(ProfilesTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(GadsTableSeeder::class);
        // $this->call(CityMunicipalitiesTableSeeder::class);
        // $this->call(GadQuestionsTableSeeder::class);
        // $this->call(GadSubquestionsTableSeeder::class);
        // $this->call(GadChoicesTableSeeder::class);
        // $this->call(GadSubquestionChoiceTableSeeder::class);
        $this->call(ReadinessesTableSeeder::class);
        $this->call(CipTypesTableSeeder::class);
        $this->call(PdpChaptersTableSeeder::class);
        $this->call(PdpIndicatorsTableSeeder::class);
        $this->call(FsStatusesTableSeeder::class);
        // $this->call(VersionsTableSeeder::class);
        $this->call(AttachmentTypesTableSeeder::class);
        /**
         * New in v2
         */
        $this->call(PermissionsTableSeeder::class);

        $this->call(CostStructuresTableSeeder::class);
        $this->call(PrexcProgramsTableSeeder::class);
        $this->call(PrexcSubprogramsTableSeeder::class);
        $this->call(BannerProgramsTableSeeder::class);
        $this->call(PrexcActivitiesTableSeeder::class);
        $this->call(OperatingUnitPrexcProgramTableSeeder::class);
        $this->call(OperatingUnitPrexcSubprogramTableSeeder::class);
        $this->call(InfrastructureSectorsTableSeeder::class);
        $this->call(InfrastructureSubsectorsTableSeeder::class);
        $this->call(ProjectPreparationDocumentsTableSeeder::class);
        $this->call(SubmissionStatusesTableSeeder::class);
    }
}
