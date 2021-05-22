-- This query will get the status of projects by operating unit
SELECT
a.id, b.name AS submission_status,
c.name AS operating_unit
FROM projects a LEFT JOIN submission_statuses b
ON a.submission_status_id=b.id
LEFT JOIN operating_units c ON a.operating_unit_id=c.id;

-- Total investment requirements
SELECT
a.id,
a.title,
b.name AS operating_unit,
c.name AS spatial_coverage,
a.investment_target_2016,
a.investment_target_2017,
a.investment_target_2018,
a.investment_target_2019,
a.investment_target_2020,
a.investment_target_2021,
a.investment_target_2022,
a.investment_target_2023,
a.investment_target_2024,
a.investment_target_2025,
a.investment_target_total
FROM projects a
LEFT JOIN operating_units b ON a.operating_unit_id=b.id
LEFT JOIN spatial_coverages c ON a.spatial_coverage_id=c.id;

-- programs
SELECT
b.name AS prexc_program,
c.name AS prexc_subprogram,
d.name AS operating_unit,
a.*
FROM prexc_activities a
LEFT JOIN prexc_programs b ON a.prexc_program_id = b.id
LEFT JOIN prexc_subprograms c ON a.prexc_subprogram_id = c.id
LEFT JOIN operating_units d ON a.operating_unit_id=d.id;
