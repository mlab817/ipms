<?php

use Illuminate\Database\Seeder;

class PdpIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('pdp_indicators')->truncate();

        DB::table('pdp_indicators')->insert(
        [
				  [
				    "name" =>  "Chapter 5 Ensuring People-Centered, Clean and Efficient Governance",
				    "id" =>  5
				  ],
				  [
				    "name" =>  "Chapter 6 Pursuing Swift and Fair Administration of Values Justice",
				    "id" =>  6
				  ],
				  [
				    "name" =>  "Chapter 7 Promoting Philippine Culture and Values",
				    "id" =>  7
				  ],
				  [
				    "name" =>  "Chapter 8 Expanding Economic Opportunities in Agriculture, Forestry and Fisheries",
				    "id" =>  8
				  ],
				  [
				    "name" =>  "Chapter 9 Expanding Economic Opportunities in Industry and Services",
				    "id" =>  9
				  ],
				  [
				    "name" =>  "Chapter 10 Accelerating Human Capital Development",
				    "id" =>  10
				  ],
				  [
				    "name" =>  "Chapter 11 Reducing Vulnerability of Individuals and Families",
				    "id" =>  11
				  ],
				  [
				    "name" =>  "Chapter 12 Building Safe and Secure Communities",
				    "id" =>  12
				  ],
				  [
				    "name" =>  "Chapter 13 Reaching for the Demographic Dividend",
				    "id" =>  13
				  ],
				  [
				    "name" =>  "Chapter 14 Vigorously Advancing Science, Technology, and Innovation",
				    "id" =>  14
				  ],
				  [
				    "name" =>  "Chapter 15 Ensuring Sound Macroeconomic Policy",
				    "id" =>  15
				  ],
				  [
				    "name" =>  "Chapter 16 Formulating the Framework for National Competition Policy",
				    "id" =>  16
				  ],
				  [
				    "name" =>  "Chapter 17 Attaining Just and Lasting Peace",
				    "id" =>  17
				  ],
				  [
				    "name" =>  "Chapter 18 Ensuring Security, Public Order, and Safety",
				    "id" =>  18
				  ],
				  [
				    "name" =>  "Chapter 19 Accelerating Strategic Infrastructure Development",
				    "id" =>  19
				  ],
				  [
				    "name" =>  "Chapter 20 Ensuring Ecological Integrity, Clean and Healthy Environment",
				    "id" =>  20
				  ],
				  [
				    "name" =>  "Anti-corruption intiatives improved",
				    "id" =>  511
				  ],
				  [
				    "name" =>  "Proportion of children under 5 years of age whose births have been registered with a civil authority increased (%)",
				    "id" =>  5121
				  ],
				  [
				    "name" =>  "Number of regulatory agencies covered by the regulatory review increased",
				    "id" =>  5122
				  ],
				  [
				    "name" =>  "Number of OFW Helpdesks (OHDs) available increased",
				    "id" =>  5123
				  ],
				  [
				    "name" =>  "Rightsizing the National Government Act of 2017 passed",
				    "id" =>  5131
				  ],
				  [
				    "name" =>  "Proportion of LGUs adopting PFM improvement measures (cumulative, %)",
				    "id" =>  5132
				  ],
				  [
				    "name" =>  "Number of voters' education and information campaigns conducted increased",
				    "id" =>  5141
				  ],
				  [
				    "name" =>  "Number of PCMs fully disclosing financial documents to the public =>  - Provinces; - Cities; and - Municipalities",
				    "id" =>  5211
				  ],
				  [
				    "name" =>  "Number of justice zones established increased",
				    "id" =>  6111
				  ],
				  [
				    "name" =>  "Number of courts with rolled-out continous trial increased",
				    "id" =>  6112
				  ],
				  [
				    "name" =>  "Number of courts with rolled-out e-courts increased",
				    "id" =>  6113
				  ],
				  [
				    "name" =>  "Philippine Mediation Center (PMC) units established",
				    "id" =>  6114
				  ],
				  [
				    "name" =>  "Percentage of qualified inmates (based on court orders for release) in city/municipal/district jails released on time maintained",
				    "id" =>  6121
				  ],
				  [
				    "name" =>  "Percentage of qualified inmates (granted parole/pardon and served sentence) in national prisons released on time maintained",
				    "id" =>  6122
				  ],
				  [
				    "name" =>  "Prosecutor to court ratio improved (cumulative)",
				    "id" =>  6123
				  ],
				  [
				    "name" =>  "Public attorney to court ratio improved (cumulative)",
				    "id" =>  6124
				  ],
				  [
				    "name" =>  "All requests for free legal assistance/representation acted upon within three (3) working days from date of request maintained (%)",
				    "id" =>  6125
				  ],
				  [
				    "name" =>  "Victims Compensation Program beneficiaries increased",
				    "id" =>  6126
				  ],
				  [
				    "name" =>  "Increased level of awareness of the following =>  Filipino Values, Cultural diversity, Creativity, Culture sensitivity",
				    "id" =>  7111
				  ],
				  [
				    "name" =>  "Enhanced tolerance and respect for tohers",
				    "id" =>  7112
				  ],
				  [
				    "name" =>  "Inclusion of culture in all development plans in key growth areas according to the National Spatial Strategy",
				    "id" =>  7113
				  ],
				  [
				    "name" =>  "Heightened pride of place and pride of being Filipino",
				    "id" =>  7114
				  ],
				  [
				    "name" =>  "Reached the target number of benefeciaries (individuals, groups, organizations, communities) who were provided support",
				    "id" =>  7115
				  ],
				  [
				    "name" =>  "Diverse cultures valued",
				    "id" =>  7121
				  ],
				  [
				    "name" =>  "Pagkamalikhain\" values of creative excellence advanced",
				    "id" =>  7122
				  ],
				  [
				    "name" =>  "Values that foster the common good inculcated",
				    "id" =>  7123
				  ],
				  [
				    "name" =>  "Culture-sensitive public governance and development strengthened",
				    "id" =>  7124
				  ],
				  [
				    "name" =>  "Program area for perennial crops provided with technical support services increased (ha) (Mango, Coffee, Cacao,Rubber, Banana, Pineapple, Cassava, Abaca and Coconut)",
				    "id" =>  8111
				  ],
				  [
				    "name" =>  "Program harvest area for staple crops provided with technical support services increased (ha) (Palay, Yellow Corn and White Corn)",
				    "id" =>  8112
				  ],
				  [
				    "name" =>  "Number of group beneficiaries provided with technical support services increased",
				    "id" =>  8113
				  ],
				  [
				    "name" =>  "Number of fisherfolk provided with production support increased",
				    "id" =>  8114
				  ],
				  [
				    "name" =>  "Number of group beneficiaries provided with agricultural and fishery machineries and equipment increased",
				    "id" =>  8115
				  ],
				  [
				    "name" =>  "Area within the production forest, for tree plantation and non-timber forest products increased (ha, cumulative) (Tree Plantation and Non-Timber Forest Products)",
				    "id" =>  8116
				  ],
				  [
				    "name" =>  "Number of AFF-enterprises with technical support increased",
				    "id" =>  8121
				  ],
				  [
				    "name" =>  "Access to value chains increased",
				    "id" =>  821
				  ],
				  [
				    "name" =>  "Share of AFF research and development (R&D) government budget to total AFF GVA increased (%, cumulative)",
				    "id" =>  8221
				  ],
				  [
				    "name" =>  "Number of new technologies increased",
				    "id" =>  8222
				  ],
				  [
				    "name" =>  "Number of beneficiaries provided with extension services increased",
				    "id" =>  8223
				  ],
				  [
				    "name" =>  "Number of small farmer/fisherfolk organizations participated in institutional capacity building on innovative financing increased (cumulative)",
				    "id" =>  8231
				  ],
				  [
				    "name" =>  "Proportion of LGUs with established partnerships for the implementation of agricultural insurance to the total number of LGUs increased (%, cumulative)",
				    "id" =>  8232
				  ],
				  [
				    "name" =>  "Area distributed under CARP increased (ha, cumulative)",
				    "id" =>  8241
				  ],
				  [
				    "name" =>  "Number of ARBs with EP/CLOAs increased (cumulative)",
				    "id" =>  8242
				  ],
				  [
				    "name" =>  "Area of collective CLOAs subdivided increased (ha, cumulative)",
				    "id" =>  8243
				  ],
				  [
				    "name" =>  "Number of registered fisherfolk provided with livelihood projects increased",
				    "id" =>  8244
				  ],
				  [
				    "name" =>  "Total approved investments increased (PHP million)",
				    "id" =>  9111
				  ],
				  [
				    "name" =>  "Net FDI increased (USD million)",
				    "id" =>  9112
				  ],
				  [
				    "name" =>  "Number of harmonized investment promotion activities conducted",
				    "id" =>  9113
				  ],
				  [
				    "name" =>  "Philippine Business Registry (PBR) fully operationalized (% of agencies\" involvement)",
				    "id" =>  9121
				  ],
				  [
				    "name" =>  "Number of cities/municipalities with fully- implemented Business Permit and Licensing System connected to the PBR",
				    "id" =>  9122
				  ],
				  [
				    "name" =>  "Number of Filipino trademarks registered increased",
				    "id" =>  9123
				  ],
				  [
				    "name" =>  "Consumer access to safe and quality goods and services ensured",
				    "id" =>  9131
				  ],
				  [
				    "name" =>  "Number of consumer awareness and advocacy initiatives undertaken",
				    "id" =>  9132
				  ],
				  [
				    "name" =>  "Number of consumer education, information and communication materials produced",
				    "id" =>  9133
				  ],
				  [
				    "name" =>  "Number of MSMEs participating in Global Value Chains",
				    "id" =>  9211
				  ],
				  [
				    "name" =>  "Number of MSMEs/Cooperatives integrated into corporate value chains increased",
				    "id" =>  9212
				  ],
				  [
				    "name" =>  "Number of Go Negosyo centers established",
				    "id" =>  9213
				  ],
				  [
				    "name" =>  "Access to finance improved",
				    "id" =>  922
				  ],
				  [
				    "name" =>  "Number of shared service facilities established",
				    "id" =>  9231
				  ],
				  [
				    "name" =>  "Number of Small Enterprise Technology Upgrading Program beneficiaries increased",
				    "id" =>  9232
				  ],
				  [
				    "name" =>  "Number of clients/customers provided with testing and calibration services increased",
				    "id" =>  9233
				  ],
				  [
				    "name" =>  "Care at all life stages guaranteed",
				    "id" =>  10111
				  ],
				  [
				    "name" =>  "Access through functional service delivery networks ensured",
				    "id" =>  10112
				  ],
				  [
				    "name" =>  "Health financing sustained",
				    "id" =>  10113
				  ],
				  [
				    "name" =>  "Quality, accessible, relevant, and liberating basic education for all achieved",
				    "id" =>  10121
				  ],
				  [
				    "name" =>  "Quality of higher education and technical education and research for equity and global competitiveness improved",
				    "id" =>  10122
				  ],
				  [
				    "name" =>  "-",
				    "id" =>  10131
				  ],
				  [
				    "name" =>  "Employability improved",
				    "id" =>  10132
				  ],
				  [
				    "name" =>  "Productivity improved",
				    "id" =>  10133
				  ],
				  [
				    "name" =>  "Percentage of population covered by PhilHealth insurance (cumulative)",
				    "id" =>  11111
				  ],
				  [
				    "name" =>  "Proportion of poor senior citizens covered by social pension (cumulative)",
				    "id" =>  11112
				  ],
				  [
				    "name" =>  "Number of Conditional Cash Transfer (CCT) beneficiaries covered (cumulative)",
				    "id" =>  11113
				  ],
				  [
				    "name" =>  "Percentage of economically active population contributing to SSS pension scheme increased (cumulative)",
				    "id" =>  11114
				  ],
				  [
				    "name" =>  "Percentage of employed in the government covered by GSIS",
				    "id" =>  11115
				  ],
				  [
				    "name" =>  "Number of OFW membership to OWWA increased (cumulative)",
				    "id" =>  11116
				  ],
				  [
				    "name" =>  "Number of child laborers assisted",
				    "id" =>  11117
				  ],
				  [
				    "name" =>  "Number of families with child laborers provided with livelihood assistance",
				    "id" =>  11118
				  ],
				  [
				    "name" =>  "Percentage of families affected by natural and human-induced calamities provided with relief assistance",
				    "id" =>  11119
				  ],
				  [
				    "name" =>  "Percentage of emergency shelter assistance provided",
				    "id" =>  111110
				  ],
				  [
				    "name" =>  "All emergency loan applications by calamity-affected GSIS members and pensioners granted (%)",
				    "id" =>  111111
				  ],
				  [
				    "name" =>  "Ratio of total government spending in SP to GDP increased (%)",
				    "id" =>  111112
				  ],
				  [
				    "name" =>  "Ratio of total government spending in SP to the national budget increased (%)",
				    "id" =>  111113
				  ],
				  [
				    "name" =>  "Proportion of socialized housing targets met to housing needs improved (%) (cumulative)",
				    "id" =>  12111
				  ],
				  [
				    "name" =>  "Proportion of low-cost housing targets met to housing needs improved (%) (Cumulative)",
				    "id" =>  12112
				  ],
				  [
				    "name" =>  "Number of socialized housing units delivered (cumulative)",
				    "id" =>  12113
				  ],
				  [
				    "name" =>  "Number of low-cost housing units delivered (cumulative)",
				    "id" =>  12114
				  ],
				  [
				    "name" =>  "Demographic transition accelerated",
				    "id" =>  131
				  ],
				  [
				    "name" =>  "Maximize gains from the demographic dividend",
				    "id" =>  132
				  ],
				  [
				    "name" =>  "Number of technology adoptors increased (incremental)",
				    "id" =>  14111
				  ],
				  [
				    "name" =>  "Number of Filipino patents granted increased (cumulative)",
				    "id" =>  14112
				  ],
				  [
				    "name" =>  "Number of Filipino utility models registered increased (cumulative)",
				    "id" =>  14113
				  ],
				  [
				    "name" =>  "Number of Filipino industrial designs registered increased (cumulative)",
				    "id" =>  14114
				  ],
				  [
				    "name" =>  "Number of technology business incubators (TBI) graduates increased (i.e. enterprises and spin-offs)",
				    "id" =>  14121
				  ],
				  [
				    "name" =>  "Number of innovation hubs increased (e.g. TBIs, innovation centers, niche centers, etc.) (cumulative)",
				    "id" =>  14122
				  ],
				  [
				    "name" =>  "R&D expenditure of business enterprises increased (in PHP Billion)",
				    "id" =>  14123
				  ],
				  [
				    "name" =>  "R&D expenditure as a proportion of GDP increased (in percent, cumulative)",
				    "id" =>  14211
				  ],
				  [
				    "name" =>  "Number of Researchers, Scientists and Engineers (RSEs) per million population Increased (cumulative)",
				    "id" =>  14212
				  ],
				  [
				    "name" =>  "Number of Science, Technology, Engineering, and Mathematics (STEM) enrollees in higher education institutes (HEIs) increased (in million, cumulative)",
				    "id" =>  14213
				  ],
				  [
				    "name" =>  "Number of STEM graduates in HEIs increased",
				    "id" =>  14214
				  ],
				  [
				    "name" =>  "Number of STEM enrollees in high school increased",
				    "id" =>  14215
				  ],
				  [
				    "name" =>  "Number of STEM graduates in high school increased",
				    "id" =>  14216
				  ],
				  [
				    "name" =>  "Number of scientific articles published in International Scientific Indexing (ISI)/Scopus Index Journal by Filipino authors increased",
				    "id" =>  14217
				  ],
				  [
				    "name" =>  "Number of Innovation Hubs Established",
				    "id" =>  14218
				  ],
				  [
				    "name" =>  "Number of Balik Scientists Engaged increased (cumulative)",
				    "id" =>  14219
				  ],
				  [
				    "name" =>  "Number of collaborations between HEIs and industries increased (cumulative)",
				    "id" =>  14221
				  ],
				  [
				    "name" =>  "Number of collaborations between HEIs and government increased (NGAs and LGUs) (cumulative)",
				    "id" =>  14222
				  ],
				  [
				    "name" =>  "Number of STI-related international cooperations of HEIs increased (cumulative)",
				    "id" =>  14223
				  ],
				  [
				    "name" =>  "Number of new STI-related international cooperations of NGAs increased",
				    "id" =>  14224
				  ],
				  [
				    "name" =>  "Incremental revenue of BIR with the implementation of tax administration and tax policy reform realized (% of GDP)",
				    "id" =>  15111
				  ],
				  [
				    "name" =>  "Incremental revenue of BOC with the implementation of tax administration and tax policy reform realized (% of GDP)",
				    "id" =>  15112
				  ],
				  [
				    "name" =>  "Incremental revenue of LTO with the implementation of tax administration and tax policy reform realized (% of GDP)",
				    "id" =>  15113
				  ],
				  [
				    "name" =>  "Number of Public Financial Management (PFM) practitioners who attended at least one PFM Competency Program (PFMCP) course increased",
				    "id" =>  15114
				  ],
				  [
				    "name" =>  "Number of training activities conducted on Government Procurement Reform Act (RA 9184) and its revised implementing rules and regulations (IRR) increased",
				    "id" =>  15115
				  ],
				  [
				    "name" =>  "Foreign currency debt maintained within debt management targets (% of total outstanding debt)",
				    "id" =>  15116
				  ],
				  [
				    "name" =>  "Average maturity of NG debt portfolio maintained within strategic guidelines (residual maturity in years)",
				    "id" =>  15117
				  ],
				  [
				    "name" =>  "All LGUs assessed on revenue and assessment performance (% of LGUs)",
				    "id" =>  15118
				  ],
				  [
				    "name" =>  "Resilient and inclusive monetary and financial sectors achieved",
				    "id" =>  1512
				  ],
				  [
				    "name" =>  "Number of DTI-assisted technology-enabled and technology-based exporters increased",
				    "id" =>  15131
				  ],
				  [
				    "name" =>  "Number of validated enrollees to the Regional Interactive Platform for Philippine Exporters (RIPPLES) Plus Program exporting increased",
				    "id" =>  15132
				  ],
				  [
				    "name" =>  "Number of new export products certified as Halal increased",
				    "id" =>  15133
				  ],
				  [
				    "name" =>  "Consumer welfare improved",
				    "id" =>  161
				  ],
				  [
				    "name" =>  "Anti-competitive practices diminished",
				    "id" =>  1621
				  ],
				  [
				    "name" =>  "Barriers to entry reduced",
				    "id" =>  1622
				  ],
				  [
				    "name" =>  "Proportion of recommendations based on review of legislations and policies that may substantially prevent, restrict, or lessen competition (%)",
				    "id" =>  16231
				  ],
				  [
				    "name" =>  "Number of rules and regulations reviewed",
				    "id" =>  16232
				  ],
				  [
				    "name" =>  "Proportion of corrective measures for identified GOCCs initiated (%, cumulative)",
				    "id" =>  16233
				  ],
				  [
				    "name" =>  "Number of peace agreements signed",
				    "id" =>  17111
				  ],
				  [
				    "name" =>  "Number of final peace agreements substantially implemented",
				    "id" =>  17112
				  ],
				  [
				    "name" =>  "Number of encounters with internal non-state armed conflict groups",
				    "id" =>  17113
				  ],
				  [
				    "name" =>  "Percentage of former combatants who have completed covered by integration, healing and reconciliation programs",
				    "id" =>  17114
				  ],
				  [
				    "name" =>  "Number of non-state armed groups transitioned into legitimate socioeconomic / political organizations",
				    "id" =>  17115
				  ],
				  [
				    "name" =>  "Number of barangays affected by internal armed conflict",
				    "id" =>  17121
				  ],
				  [
				    "name" =>  "Number of individuals displaced due to internal armed conflict",
				    "id" =>  17122
				  ],
				  [
				    "name" =>  "Number of local government units in conflict-affected and conflict-vulnerable areas with local development plans integrating conflict sensitive and peace promoting approaches",
				    "id" =>  1721
				  ],
				  [
				    "name" =>  "Number of formal educational institutions integrating peace education into their curriculum",
				    "id" =>  1722
				  ],
				  [
				    "name" =>  "Number of reported human rights and IHL violations cases",
				    "id" =>  1723
				  ],
				  [
				    "name" =>  "Territorial integrity and sovereignty upheld and protected",
				    "id" =>  1811
				  ],
				  [
				    "name" =>  "All forms of criminality and illegal drugs significantly reduced",
				    "id" =>  1812
				  ],
				  [
				    "name" =>  "Public safety ensured",
				    "id" =>  1813
				  ],
				  [
				    "name" =>  "Security and safety of overseas Filipinos ensured",
				    "id" =>  1814
				  ],
				  [
				    "name" =>  "New roads constructed (lane km, cumulative)",
				    "id" =>  19111
				  ],
				  [
				    "name" =>  "Total length of standard gauge rail tracks increased (km, cumulative)",
				    "id" =>  19112
				  ],
				  [
				    "name" =>  "Number of night-rated airports increased",
				    "id" =>  19113
				  ],
				  [
				    "name" =>  "Rehabilitated irrigation service areas increased (Existing Areas (ha))",
				    "id" =>  19114
				  ],
				  [
				    "name" =>  "Rehabilitated irrigation service areas increased (Canals(km))",
				    "id" =>  19115
				  ],
				  [
				    "name" =>  "Restored irrigation service areas increased (ha) - National Irrigation System (NIS)",
				    "id" =>  19116
				  ],
				  [
				    "name" =>  "Restored irrigation service areas increased (ha) - Small-scale Irrigation Systems",
				    "id" =>  19117
				  ],
				  [
				    "name" =>  "Developed new service areas increased (ha) -NIS",
				    "id" =>  19118
				  ],
				  [
				    "name" =>  "Developed new service areas increased (ha) -SSIS",
				    "id" =>  19119
				  ],
				  [
				    "name" =>  "Coverage area of irrigation facilities increased (ha, cumulative)",
				    "id" =>  191110
				  ],
				  [
				    "name" =>  "Renewable Energy (RE) capacity increased (MW, cumulative)",
				    "id" =>  191111
				  ],
				  [
				    "name" =>  "Proportion of HHs with access to safe water supply to total number of HHs increased (%, cumulative)",
				    "id" =>  19121
				  ],
				  [
				    "name" =>  "Proportion of cities/municipalities served by water districts with 24/7 water supply increased (%, cumulative)",
				    "id" =>  19122
				  ],
				  [
				    "name" =>  "Number of households served by WDs with water service connections increased (cumulative)",
				    "id" =>  19123
				  ],
				  [
				    "name" =>  "Volume of desludged and/or treated septage in WDs increased (m3)",
				    "id" =>  19124
				  ],
				  [
				    "name" =>  "Proportion of HHs with electricity to total number of HHs increased (%, cumulative)",
				    "id" =>  19125
				  ],
				  [
				    "name" =>  "Proportion of barangays with access to Material Recovery Facilities (MRFs) to total no. of barangays (%, cumulative)",
				    "id" =>  19126
				  ],
				  [
				    "name" =>  "Proportion of barangays with access to Sanitary Land Fills (SLFs) to total number of barangays (%, cumulative)",
				    "id" =>  19127
				  ],
				  [
				    "name" =>  "Proportion of public schools with connection to electricity to total number of public schools increased (%, cumulative) - Primary (K to 6) - Junior High School - Senior High School",
				    "id" =>  19211
				  ],
				  [
				    "name" =>  "Proportion of public schools with internet access to total number of public schools increased (%, cumulative) - Primary (K to 6) - Junior High School - Senior High School",
				    "id" =>  19212
				  ],
				  [
				    "name" =>  "Proportion of public schools with computer packages to total number of public schools increased (%, cumulative) - Primary (K to 6) - Junior High School - Senior High School",
				    "id" =>  19213
				  ],
				  [
				    "name" =>  "Safety and security against natural and man-made disasters, especially for the poor improved.",
				    "id" =>  1931
				  ],
				  [
				    "name" =>  "Innovative solutions and technologies encouraged/adopted",
				    "id" =>  1941
				  ],
				  [
				    "name" =>  "",
				    "id" =>  2011
				  ],
				  [
				    "name" =>  "Area of denuded and degraded forestland decreased (M ha, cumulative)",
				    "id" =>  20111
				  ],
				  [
				    "name" =>  "Area planted with mangroves increased (ha)",
				    "id" =>  20112
				  ],
				  [
				    "name" =>  "Area of forestland under effective management increased (M ha, cumulative)",
				    "id" =>  20113
				  ],
				  [
				    "name" =>  "Production and protection forests delineated increased (km)",
				    "id" =>  20114
				  ],
				  [
				    "name" =>  "Coverage of protected areas in relation to marine areas increased (%)",
				    "id" =>  20115
				  ],
				  [
				    "name" =>  "Area of marine protected areas with high biodiversity values effectively managed increased (ha)",
				    "id" =>  20116
				  ],
				  [
				    "name" =>  "Number of coastal municipalities and cities with delineated and adopted municipal waters increased (annual)",
				    "id" =>  20117
				  ],
				  [
				    "name" =>  "Area of terrestrial protected areas with high biodiversity values effectively managed increased (ha)",
				    "id" =>  20118
				  ],
				  [
				    "name" =>  "Area of the 13 priority inland wetlands effectively managed increased (ha)",
				    "id" =>  20119
				  ],
				  [
				    "name" =>  "Number of caves with high conservation value effectively managed increased",
				    "id" =>  201110
				  ],
				  [
				    "name" =>  "Area of residential free patents issued increased (ha)",
				    "id" =>  201111
				  ],
				  [
				    "name" =>  "Number of issued Certificate of Ancestral Domain Title (CADTs) increased",
				    "id" =>  201112
				  ],
				  [
				    "name" =>  "Number of Ancestral Domain Sustainable Development and Protection Plan (ADSDPP) formulated",
				    "id" =>  201113
				  ],
				  [
				    "name" =>  "Number of groundwater critical areas with management plan and monitoring wells established",
				    "id" =>  201114
				  ],
				  [
				    "name" =>  "Number of Major River Basins (RB) with Comprehensive Water Assessment increased",
				    "id" =>  201115
				  ],
				  [
				    "name" =>  "Number of biodiversity-friendly enterprises recognized increased",
				    "id" =>  201116
				  ],
				  [
				    "name" =>  "Number of jobs generated from reforestation and non-timber/agroforestry enterprises, i.e. NGP,CBFM, increased (M)",
				    "id" =>  201117
				  ],
				  [
				    "name" =>  "Number of Community Fish Landing Centers (CFLC) established (cumulative)",
				    "id" =>  201118
				  ],
				  [
				    "name" =>  "Percentage of new and existing CFLC operationalized (cumulative)",
				    "id" =>  201119
				  ],
				  [
				    "name" =>  "Number of public utility vehicles that converted to cleaner fuels increased -Compressed natural gas -Electric/Hybrid",
				    "id" =>  20121
				  ],
				  [
				    "name" =>  "Solid waste diversion rate increased (%, cumulative)",
				    "id" =>  20122
				  ],
				  [
				    "name" =>  "Area assessed and mapped for soil fertility status and soil fertility management increased (ha)",
				    "id" =>  20123
				  ],
				  [
				    "name" =>  "Area of land degradation hotspots decreased (ha)",
				    "id" =>  20124
				  ],
				  [
				    "name" =>  "Interim rehabilitation measures monitored and implemented in 4 abandoned mines increased (%, cumulative) - Bagacay - Palawan Quicksilver - Romblon Marble - Silica Sand Mine",
				    "id" =>  20125
				  ],
				  [
				    "name" =>  "Number of eco-labeled products increased",
				    "id" =>  20211
				  ],
				  [
				    "name" =>  "Total energy savings in government offices increased (PHP million)",
				    "id" =>  20212
				  ],
				  [
				    "name" =>  "Number of LGUs with operating early warning systems (EWS) in place increased",
				    "id" =>  2031
				  ],
				  [
				    "name" =>  "Number of fully-functional DRRM operations centers increased - Permanent - Temporary",
				    "id" =>  2032
				  ],
				  [
				    "name" =>  "GHG emissions per sector reduced (million MT CO2e) - Energy - Industrial - Agriculture - LUCF - Waste - Transport",
				    "id" =>  2033
				  ]
				]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
