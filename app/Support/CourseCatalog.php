<?php

namespace App\Support;

/**
 * Master Qualification Pack & Academic Program Directory.
 * Aligned with 8 Target Sectors, 230+ Certified Roles, NSQF Levels 2 to 6,
 * and UGC & NEP 2020 Vocational Degree Programs (B.Voc & M.Voc).
 */
class CourseCatalog
{
    /**
     * Get all 8 sectors data.
     */
    public static function getSectors(): array
    {
        return [
    [
        "id" => "apparel",
        "section_num" => 1,
        "title" => "Apparel, Made-Ups & Home Furnishings Sector",
        "council" => "AMH SSC Courses",
        "badge" => "AMH SSC Aligned",
        "description" => "Apparel, garment construction, fashion tech, pattern drafting, and export quality control qualifications.",
        "columns" => [
            "Occupation",
            "QP / Job Role Name",
            "QP / Role Code",
            "Discipline"
        ],
        "roles" => [
            [
                "occupation" => "Sewing",
                "role_name" => "Tailor (Darzi)",
                "code" => "AMH/N0308",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Tailoring",
                "role_name" => "Darzi (Advance)",
                "code" => "AMH/N0705",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Quality Assurance",
                "role_name" => "Fabric Checker",
                "code" => "AMH/Q0101",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Quality Assurance",
                "role_name" => "Checker - Inline & Measurement",
                "code" => "AMH/Q0103",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Sewing",
                "role_name" => "Sewing Machine Operator",
                "code" => "AMH/Q0301",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Ironing",
                "role_name" => "Pressman",
                "code" => "AMH/Q0401",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Cutting",
                "role_name" => "Cutting Supervisor",
                "code" => "AMH/Q0610",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Department",
                "role_name" => "Processing Supervisor (Dyeing & Printing)",
                "code" => "AMH/Q0615",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Tailoring",
                "role_name" => "Sampling Tailor",
                "code" => "AMH/Q0701",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Machine Embroidery",
                "role_name" => "Embroidery Machine Operator (Zigzag)",
                "code" => "AMH/Q0801",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Merchandising",
                "role_name" => "Merchandiser - Fashion, Made-Ups & Furnishings",
                "code" => "AMH/Q0911",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Export Operations",
                "role_name" => "Sourcing Manager",
                "code" => "AMH/Q0920",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Hand Embroidery",
                "role_name" => "Hand Embroiderer (Addawala)",
                "code" => "AMH/Q1001",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Pattern Making",
                "role_name" => "Advance Pattern Maker (CAD/CAM)",
                "code" => "AMH/Q1101",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Pattern Making",
                "role_name" => "Pattern Master",
                "code" => "AMH/Q1102",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Designing",
                "role_name" => "Fashion Designer",
                "code" => "AMH/Q1201",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Designing",
                "role_name" => "Assistant Designer - Fashion, Home & Made-Ups",
                "code" => "AMH/Q1210",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Designing",
                "role_name" => "Fashion Technology Associate",
                "code" => "AMH/Q1231",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Machine Embroidery",
                "role_name" => "Framer - Computerized Embroidery Machine",
                "code" => "AMH/Q1301",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Quality Control",
                "role_name" => "QC Executive - Sewing Line",
                "code" => "AMH/Q1401",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Cutting",
                "role_name" => "Fabric Cutter",
                "code" => "AMH/Q1510",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Export Operations",
                "role_name" => "Export Executive",
                "code" => "AMH/Q1602",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Export Operations",
                "role_name" => "Export Manager",
                "code" => "AMH/Q1603",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Sampling",
                "role_name" => "Sampling Coordinator",
                "code" => "AMH/Q1801",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Sewing",
                "role_name" => "Self Employed Tailor",
                "code" => "AMH/Q1947",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Finishing",
                "role_name" => "Finisher & Packer",
                "code" => "AMH/Q2255",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Sewing",
                "role_name" => "Specialised Sewing Machine Operator",
                "code" => "AMH/Q2301",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Boutique Operations",
                "role_name" => "Boutique Manager",
                "code" => "AMH/Q2501",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Boutique Operations",
                "role_name" => "Record Keeper",
                "code" => "AMH/Q2502",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "Sampling",
                "role_name" => "Washing Machine Operator",
                "code" => "AMH/Q2601",
                "discipline" => "Skill Cert"
            ],
            [
                "occupation" => "General Tailoring",
                "role_name" => "Assistant Dress Maker",
                "code" => "JSS/ADM/2022",
                "discipline" => "Certificate"
            ]
        ]
    ],
    [
        "id" => "beauty",
        "section_num" => 2,
        "title" => "Beauty & Wellness Sector",
        "council" => "B&W SSC Validated Courses",
        "badge" => "B&W SSC Validated",
        "description" => "Aesthetic, cosmetology, hair styling, spa therapy, wellness neurotherapy, and yoga training programs.",
        "columns" => [
            "QP / Job Role Name",
            "QP / Role Code",
            "Curriculum Ver.",
            "Next Review Date"
        ],
        "roles" => [
            [
                "role_name" => "Assistant Barber - Salon Services",
                "code" => "BWS/N0232",
                "version" => "1.0",
                "review_date" => "14/09/2028"
            ],
            [
                "role_name" => "Assistant Hair Dresser",
                "code" => "BWS/N0235",
                "version" => "1.0",
                "review_date" => "14/09/2028"
            ],
            [
                "role_name" => "Assistant Beauty Therapist",
                "code" => "BWS/Q0101",
                "version" => "4.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Beauty Therapist",
                "code" => "BWS/Q0102",
                "version" => "3.0",
                "review_date" => "08/04/2024"
            ],
            [
                "role_name" => "Senior Beauty Therapist",
                "code" => "BWS/Q0104",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Cosmetologist",
                "code" => "BWS/Q0107",
                "version" => "2.0",
                "review_date" => "24/02/2025"
            ],
            [
                "role_name" => "Assistant Hair Dresser & Stylist",
                "code" => "BWS/Q0201",
                "version" => "4.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Hair Dresser & Stylist",
                "code" => "BWS/Q0202",
                "version" => "3.0",
                "review_date" => "08/04/2024"
            ],
            [
                "role_name" => "Senior Hair Dresser & Stylist",
                "code" => "BWS/Q0205",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Bridal, Fashion and Portfolio Makeup Artist",
                "code" => "BWS/Q0301",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Professional Makeup Artist",
                "code" => "BWS/Q0306",
                "version" => "2.0",
                "review_date" => "24/02/2025"
            ],
            [
                "role_name" => "Wellness Therapist (Elderly Care)",
                "code" => "BWS/Q0308",
                "version" => "1.0",
                "review_date" => "31/08/2028"
            ],
            [
                "role_name" => "Assistant Nail Technician",
                "code" => "BWS/Q0401",
                "version" => "4.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Pedicurist and Manicurist",
                "code" => "BWS/Q0402",
                "version" => "4.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Nail Technician",
                "code" => "BWS/Q0403",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Aesthetic Skin Technician",
                "code" => "BWS/Q0504",
                "version" => "2.0",
                "review_date" => "24/02/2025"
            ],
            [
                "role_name" => "Assistant Spa Therapist",
                "code" => "BWS/Q1001",
                "version" => "4.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Spa Therapist",
                "code" => "BWS/Q1002",
                "version" => "2.0",
                "review_date" => "08/04/2024"
            ],
            [
                "role_name" => "Yoga Instructor (B&W)",
                "code" => "BWS/Q2201",
                "version" => "3.0",
                "review_date" => "27/05/2024"
            ],
            [
                "role_name" => "Yoga Trainer (B&W)",
                "code" => "BWS/Q2203",
                "version" => "3.0",
                "review_date" => "27/05/2024"
            ],
            [
                "role_name" => "Senior Yoga Trainer (B&W)",
                "code" => "BWS/Q2205",
                "version" => "3.0",
                "review_date" => "27/05/2024"
            ],
            [
                "role_name" => "Wellness Neurotherapist",
                "code" => "BWS/Q2301",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Senior Wellness Neurotherapist",
                "code" => "BWS/Q2302",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Master Wellness Neurotherapist",
                "code" => "BWS/Q2303",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Gym Assistant (B&W)",
                "code" => "BWS/Q3001",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Personal Trainer (B&W)",
                "code" => "BWS/Q3003",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ],
            [
                "role_name" => "Assistant Beauty & Wellness Consultant",
                "code" => "BWS/Q4001",
                "version" => "3.0",
                "review_date" => "31/08/2024"
            ]
        ]
    ],
    [
        "id" => "food-processing",
        "section_num" => 3,
        "title" => "Food Processing Sector",
        "council" => "FICSI Aligned Programs",
        "badge" => "FICSI Aligned",
        "description" => "Industrial bakery, baking technician, commercial craft baking, and culinary production certifications.",
        "columns" => [
            "Sector Domain",
            "Approved Course Name",
            "Total Hours (Duration)"
        ],
        "roles" => [
            [
                "domain" => "Food Processing",
                "role_name" => "Baking Assistant",
                "duration" => "210 Hours",
                "code" => "FICSI/BA/210"
            ],
            [
                "domain" => "Food Processing",
                "role_name" => "Baking Technician",
                "duration" => "340 Hours",
                "code" => "FICSI/BT/340"
            ],
            [
                "domain" => "Food Processing",
                "role_name" => "Craft Baker",
                "duration" => "390 Hours",
                "code" => "FICSI/CB/390"
            ],
            [
                "domain" => "Food Processing",
                "role_name" => "Food Production Cook cum Helper",
                "duration" => "390 Hours",
                "code" => "FICSI/FPC/390"
            ]
        ]
    ],
    [
        "id" => "electronics",
        "section_num" => 4,
        "title" => "Electronics System Design & Manufacturing (ESDM)",
        "council" => "ESSCI Standards (Part 1 & 2)",
        "badge" => "ESSCI Standards",
        "description" => "VLSI design, semiconductor packaging, IoT hardware, drone manufacturing, EV battery design, and industrial automation.",
        "columns" => [
            "Sub-Sector / Occupation",
            "Job Role / Qualification Pack Name",
            "QP Code",
            "Ver."
        ],
        "roles" => [
            [
                "subsector" => "Research & Design - I&A",
                "role_name" => "Foundation Program on Nano Science and Technology",
                "code" => "ELE/N6105",
                "version" => "1"
            ],
            [
                "subsector" => "Research & Design - I&A",
                "role_name" => "Advanced Program on Nanoscience and Technology",
                "code" => "ELE/N6106",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Winding Operator",
                "code" => "ELE/Q0101",
                "version" => "3"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Welding Operator Electronics",
                "code" => "ELE/Q0102",
                "version" => "4"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Die Attach and Wire Bonding Engineer",
                "code" => "ELE/Q0117",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Laser Marking and Cutting - Process Engineer",
                "code" => "ELE/Q0118",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Molding Process Engineer",
                "code" => "ELE/Q0119",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Quality Analysis & Reliability Engineer",
                "code" => "ELE/Q0120",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Failure Analysis and Reliability Engineer",
                "code" => "ELE/Q0121",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Wafer Test & Sort Engineer",
                "code" => "ELE/Q0122",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Package Design Engineer",
                "code" => "ELE/Q0123",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "IC Package Engineer",
                "code" => "ELE/Q0124",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Wafer Back Grinding Engineer",
                "code" => "ELE/Q0125",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Wafer Dicing Engineer",
                "code" => "ELE/Q0126",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Solder Ball Attach Process Engineer",
                "code" => "ELE/Q0127",
                "version" => "1"
            ],
            [
                "subsector" => "Production - S&C",
                "role_name" => "Saw Singulation Process Engineer",
                "code" => "ELE/Q0128",
                "version" => "1"
            ],
            [
                "subsector" => "Marketing & Sales - S&C",
                "role_name" => "Sr. Executive Business Development",
                "code" => "ELE/Q1101",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design - S&C",
                "role_name" => "VLSI Design Engineer",
                "code" => "ELE/Q1201",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design",
                "role_name" => "Embedded Product Design Engineer - Technical Lead",
                "code" => "ELE/Q1403",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design",
                "role_name" => "Embedded Full-Stack IoT Analyst",
                "code" => "ELE/Q1404",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design",
                "role_name" => "IoT Hardware Analyst",
                "code" => "ELE/Q1405",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design - S&C",
                "role_name" => "Semiconductor Process Technology Engineer - Upskilling",
                "code" => "ELE/Q1406",
                "version" => "1"
            ],
            [
                "subsector" => "System Software Dev",
                "role_name" => "Embedded Software Engineer",
                "code" => "ELE/Q1501",
                "version" => "3"
            ],
            [
                "subsector" => "Maintenance",
                "role_name" => "Electronics Machine Maintenance Executive",
                "code" => "ELE/Q2501",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "TV Repair Technician",
                "code" => "ELE/Q3101",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Field Technician Air Conditioner",
                "code" => "ELE/Q3102",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Field Technician Other Home Appliances",
                "code" => "ELE/Q3104",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Field Engineer RACW",
                "code" => "ELE/Q3105",
                "version" => "2"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Service Technician - Home Appliances",
                "code" => "ELE/Q3111",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Support",
                "role_name" => "HVAC Technician",
                "code" => "ELE/Q3112",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Multi Skill Technician (Electrical)",
                "code" => "ELE/Q3115",
                "version" => "2"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Junior Field Technician - Home Appliance",
                "code" => "ELE/Q3117",
                "version" => "1"
            ],
            [
                "subsector" => "Assembly - EMS",
                "role_name" => "Smartphone Assembly Technician / RAC / TV Operator",
                "code" => "ELE/Q3901",
                "version" => "3"
            ],
            [
                "subsector" => "Assembly - EMS",
                "role_name" => "Assembly Line Operator",
                "code" => "ELE/Q4301",
                "version" => "3"
            ],
            [
                "subsector" => "Manufacturing",
                "role_name" => "Incoming QC Technician",
                "code" => "ELE/Q4401",
                "version" => "2"
            ],
            [
                "subsector" => "Maintenance",
                "role_name" => "Maintenance Technician",
                "code" => "ELE/Q4501",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Field Technician Computing and Peripherals",
                "code" => "ELE/Q4601",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Support",
                "role_name" => "Customer Care Executive / Remote Helpdesk",
                "code" => "ELE/Q4603",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Support",
                "role_name" => "CCTV Installation Technician",
                "code" => "ELE/Q4605",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Support",
                "role_name" => "Field Technician Networking and Storage",
                "code" => "ELE/Q4606",
                "version" => "3"
            ],
            [
                "subsector" => "After Sales Support",
                "role_name" => "Service Engineer - IT Hardware",
                "code" => "ELE/Q4607",
                "version" => "2"
            ],
            [
                "subsector" => "Assembly & Soldering",
                "role_name" => "Pick & Place / Through-hole Assembly Operator",
                "code" => "ELE/Q5102",
                "version" => "3"
            ],
            [
                "subsector" => "Manufacturing",
                "role_name" => "EMS Operation & Maintenance Manager",
                "code" => "ELE/Q5312",
                "version" => "2"
            ],
            [
                "subsector" => "Assembly & Soldering",
                "role_name" => "EMS Technician",
                "code" => "ELE/Q5315",
                "version" => "3"
            ],
            [
                "subsector" => "Quality Checking",
                "role_name" => "In-Process and Final Quality Engineer",
                "code" => "ELE/Q5501",
                "version" => "2"
            ],
            [
                "subsector" => "Incoming Inspection",
                "role_name" => "Incoming Materials Inspector - Electronics",
                "code" => "ELE/Q5502",
                "version" => "3"
            ],
            [
                "subsector" => "Solar & LED",
                "role_name" => "LED Luminary Assembly & Testing Technician",
                "code" => "ELE/Q5803",
                "version" => "3"
            ],
            [
                "subsector" => "Installation - S&L",
                "role_name" => "Solar Panel / Solar LED Technician",
                "code" => "ELE/Q5901",
                "version" => "3"
            ],
            [
                "subsector" => "Product Design - EM&B",
                "role_name" => "Battery System Design Engineer",
                "code" => "ELE/Q6701",
                "version" => "2"
            ],
            [
                "subsector" => "Product Design - EM&B",
                "role_name" => "Motor and Controller Design Engineer",
                "code" => "ELE/Q6702",
                "version" => "2"
            ],
            [
                "subsector" => "Support - EM&B",
                "role_name" => "Battery System Repair Technician",
                "code" => "ELE/Q7001",
                "version" => "2"
            ],
            [
                "subsector" => "Support - EM&B",
                "role_name" => "Motor & Controller Repairing Technician",
                "code" => "ELE/Q7002",
                "version" => "2"
            ],
            [
                "subsector" => "Support - EM&B",
                "role_name" => "Drone Service Technician / Assistant",
                "code" => "ELE/Q7003",
                "version" => "2"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Building Management System Project Manager",
                "code" => "ELE/Q7102",
                "version" => "2"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Mechanical Engineering and Plumbing GM",
                "code" => "ELE/Q7103",
                "version" => "2"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Building Management System Service Engineer",
                "code" => "ELE/Q7104",
                "version" => "1"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Mechatronics Maintenance Specialist",
                "code" => "ELE/Q7105",
                "version" => "2"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Robotics Automation Lead",
                "code" => "ELE/Q7106",
                "version" => "1"
            ],
            [
                "subsector" => "Engineering - I&A",
                "role_name" => "Mechatronics Designer and System Integrator",
                "code" => "ELE/Q7107",
                "version" => "2"
            ],
            [
                "subsector" => "Assembly - I&A",
                "role_name" => "Drone Manufacturing and Assembly Technician",
                "code" => "ELE/Q7307",
                "version" => "2"
            ],
            [
                "subsector" => "Manufacturing",
                "role_name" => "PCB Assembly Operator",
                "code" => "ELE/Q7804",
                "version" => "3"
            ],
            [
                "subsector" => "Quality Maintenance",
                "role_name" => "Quality Manager - Electronics",
                "code" => "ELE/Q7902",
                "version" => "1"
            ],
            [
                "subsector" => "After Sales Service",
                "role_name" => "Mobile Phone Hardware Repair Technician",
                "code" => "ELE/Q8104",
                "version" => "3"
            ],
            [
                "subsector" => "Generic Management",
                "role_name" => "Project Manager Electronics",
                "code" => "ELE/Q9801",
                "version" => "1"
            ]
        ]
    ],
    [
        "id" => "it-ites",
        "section_num" => 5,
        "title" => "Information Technology & IT-Enabled Services (IT-ITES)",
        "council" => "NASSCOM / SSC NASSCOM Aligned",
        "badge" => "NASSCOM Aligned",
        "description" => "Full-stack development, AI data quality, cloud ERP, cybersecurity, AR/VR, and business process operations.",
        "columns" => [
            "Domain Category",
            "Professional Job Role / Certification Title",
            "Target Competency Stream"
        ],
        "roles" => [
            [
                "domain" => "Emerging Tech & AI",
                "role_name" => "AI Data Quality Analyst",
                "stream" => "Artificial Intelligence",
                "code" => "SSC/Q8101"
            ],
            [
                "domain" => "Emerging Tech & AI",
                "role_name" => "AI Business Intelligence Analyst",
                "stream" => "Data & Insights",
                "code" => "SSC/Q8102"
            ],
            [
                "domain" => "Software Engineering",
                "role_name" => "Software Developer - IT Services",
                "stream" => "Enterprise Applications",
                "code" => "SSC/Q0501"
            ],
            [
                "domain" => "Software Engineering",
                "role_name" => "Software Developer - Product Development",
                "stream" => "Product Engineering",
                "code" => "SSC/Q0502"
            ],
            [
                "domain" => "Full Stack Development",
                "role_name" => "Python Full Stack Developer",
                "stream" => "Back-End & Architecture",
                "code" => "SSC/Q0508"
            ],
            [
                "domain" => "Full Stack Development",
                "role_name" => "Angular Full Stack Developer",
                "stream" => "Front-End Frameworks",
                "code" => "SSC/Q0509"
            ],
            [
                "domain" => "Web & Mobile",
                "role_name" => "Web Developer",
                "stream" => "Web Applications",
                "code" => "SSC/Q0503"
            ],
            [
                "domain" => "Web & Mobile",
                "role_name" => "Application Developer - Web & Mobile",
                "stream" => "Cross-Platform Apps",
                "code" => "SSC/Q0504"
            ],
            [
                "domain" => "Web & Mobile",
                "role_name" => "Application Architect - Web & Mobile",
                "stream" => "Systems Architecture",
                "code" => "SSC/Q0505"
            ],
            [
                "domain" => "Immersive Technology",
                "role_name" => "AR / VR Architect",
                "stream" => "Extended Reality (XR)",
                "code" => "SSC/Q8401"
            ],
            [
                "domain" => "Cybersecurity",
                "role_name" => "Security Analyst",
                "stream" => "InfoSec & Compliance",
                "code" => "SSC/Q0901"
            ],
            [
                "domain" => "Analytics & Big Data",
                "role_name" => "Sr. Associate - Analytics",
                "stream" => "Business Analytics",
                "code" => "SSC/Q2101"
            ],
            [
                "domain" => "Data Operations",
                "role_name" => "Data Associate",
                "stream" => "Data Processing",
                "code" => "SSC/Q2201"
            ],
            [
                "domain" => "Internet of Things",
                "role_name" => "IoT Network Specialist",
                "stream" => "Connected Systems",
                "code" => "SSC/Q8201"
            ],
            [
                "domain" => "Internet of Things",
                "role_name" => "IoT Domain Specialist",
                "stream" => "Hardware & Middleware",
                "code" => "SSC/Q8202"
            ],
            [
                "domain" => "Enterprise Solutions",
                "role_name" => "SAP Associate / Specialist",
                "stream" => "Enterprise ERP",
                "code" => "SSC/Q0201"
            ],
            [
                "domain" => "Digital Business",
                "role_name" => "Digital Marketing Executive",
                "stream" => "Growth & SEO/SEM",
                "code" => "SSC/Q1001"
            ],
            [
                "domain" => "Financial Technology",
                "role_name" => "Financial Accounting with Tally",
                "stream" => "Business Accounts",
                "code" => "SSC/Q1101"
            ],
            [
                "domain" => "Infrastructure & Support",
                "role_name" => "Technical Support Engineer",
                "stream" => "L2 Technical Support",
                "code" => "SSC/Q0110"
            ],
            [
                "domain" => "Infrastructure & Support",
                "role_name" => "Domestic IT Helpdesk Attendant",
                "stream" => "L1 User Support",
                "code" => "SSC/Q0111"
            ],
            [
                "domain" => "Customer Support",
                "role_name" => "Customer Care Executive - Domestic (Voice)",
                "stream" => "Voice BPO",
                "code" => "SSC/Q2210"
            ],
            [
                "domain" => "Customer Support",
                "role_name" => "Customer Care Executive - Domestic (Non-Voice)",
                "stream" => "Non-Voice / Chat Support",
                "code" => "SSC/Q2211"
            ],
            [
                "domain" => "Technical Support",
                "role_name" => "Technical Support Executive - Voice",
                "stream" => "Voice Tech Support",
                "code" => "SSC/Q0112"
            ],
            [
                "domain" => "Technical Support",
                "role_name" => "Technical Support Executive - Non-Voice",
                "stream" => "Email / Ticket Support",
                "code" => "SSC/Q0113"
            ],
            [
                "domain" => "Digital Media",
                "role_name" => "Sr. Associate Desktop Publishing (DTP)",
                "stream" => "Graphic Publishing",
                "code" => "SSC/Q1401"
            ],
            [
                "domain" => "Operations & Data",
                "role_name" => "Domestic Data Entry Operator",
                "stream" => "Data Management",
                "code" => "SSC/Q2212"
            ],
            [
                "domain" => "IT Infrastructure",
                "role_name" => "Facility Manager",
                "stream" => "Data Center / Infrastructure",
                "code" => "SSC/Q6701"
            ],
            [
                "domain" => "Foundational Literacy",
                "role_name" => "Course on Computer Application (CCA) / BCC",
                "stream" => "Digital Literacy",
                "code" => "SSC/Q0001"
            ]
        ]
    ],
    [
        "id" => "healthcare",
        "section_num" => 6,
        "title" => "Healthcare & Allied Medical Sciences",
        "council" => "HSSC Qualification Packs",
        "badge" => "HSSC Aligned",
        "description" => "Emergency medical care, phlebotomy, panchakarma therapy, ayurveda nutrition, geriatric care, and hospital operations.",
        "columns" => [
            "Specialization / Role",
            "QP Code",
            "Level",
            "Minimum Eligibility & Criteria",
            "Min Age"
        ],
        "roles" => [
            [
                "role_name" => "Phlebotomist",
                "code" => "HSS/Q0501",
                "level" => "4",
                "eligibility" => "12th Class (Science)",
                "min_age" => 18
            ],
            [
                "role_name" => "Emergency Care Assistant",
                "code" => "HSS/Q2301",
                "level" => "4",
                "eligibility" => "12th Class, or 10th + 2-yr ITI, or NSQF L3 Medical Dresser + 1-2 yrs exp",
                "min_age" => 18
            ],
            [
                "role_name" => "Emergency Medical Technician - Basic",
                "code" => "HSS/Q2301",
                "level" => "4",
                "eligibility" => "12th Pass / Completed 2nd yr of 3-yr diploma after 10th",
                "min_age" => 18
            ],
            [
                "role_name" => "Pre-Hospital Trauma Assistant",
                "code" => "HSS/Q2305",
                "level" => "4",
                "eligibility" => "12th Class / 10th + 2-yr NTC + 1-yr NAC / NSQF Dresser + 2-3 yrs exp",
                "min_age" => 18
            ],
            [
                "role_name" => "Dresser (Medical)",
                "code" => "HSS/Q3004",
                "level" => "3",
                "eligibility" => "10th Class pass or 8th pass with 2 years relevant experience",
                "min_age" => 18
            ],
            [
                "role_name" => "Panchakarma Technician",
                "code" => "HSS/Q3601",
                "level" => "4",
                "eligibility" => "12th Class, or 10th + 2 yrs exp / NSQF Level 3 Panchakarma Assistant",
                "min_age" => 18
            ],
            [
                "role_name" => "Kshara Karma Technician",
                "code" => "HSS/Q3602",
                "level" => "4",
                "eligibility" => "12th Class pass",
                "min_age" => 18
            ],
            [
                "role_name" => "Panchakarma Assistant",
                "code" => "HSS/Q3603",
                "level" => "3",
                "eligibility" => "10th Class / 8th pass with 1-2 years experience / ITI",
                "min_age" => 18
            ],
            [
                "role_name" => "Prakriti Evaluator",
                "code" => "HSS/Q3604",
                "level" => "5 - 6",
                "eligibility" => "Graduate BAMS / Health Sciences / Life Science degree",
                "min_age" => 21
            ],
            [
                "role_name" => "Ayurveda Masseur",
                "code" => "HSS/Q3605",
                "level" => "3",
                "eligibility" => "10th Class or 8th pass + 1-2 years relevant experience",
                "min_age" => 16
            ],
            [
                "role_name" => "Naturopathy Assistant",
                "code" => "HSS/Q3606",
                "level" => "3",
                "eligibility" => "10th Class or 8th pass + 2 years experience / NSQF L2.5",
                "min_age" => 18
            ],
            [
                "role_name" => "Ayurvedic Aesthetic Assistant",
                "code" => "HSS/Q3607",
                "level" => "3",
                "eligibility" => "10th Class or 8th pass with 2 years experience / NSQF L2.5",
                "min_age" => 18
            ],
            [
                "role_name" => "Garbhini Rakshaka",
                "code" => "HSS/Q3801",
                "level" => "3",
                "eligibility" => "10th Class or 8th pass + 2-yr NTC / ITI",
                "min_age" => 16
            ],
            [
                "role_name" => "Ayurveda Ahara & Poshana Sahayak",
                "code" => "HSS/Q3901",
                "level" => "4",
                "eligibility" => "10th Class pass or 8th pass with vocational subject + 1 yr exp",
                "min_age" => 18
            ],
            [
                "role_name" => "Ayurveda Dietician",
                "code" => "HSS/Q3902",
                "level" => "5 - 6",
                "eligibility" => "Medical Graduate BAMS / B.Sc. Dietetics / PG Diploma",
                "min_age" => 23
            ],
            [
                "role_name" => "Yoga Therapy Assistant",
                "code" => "HSS/Q4001",
                "level" => "4",
                "eligibility" => "12th Class, or 10th + 2 yrs exp / NSQF Level 3",
                "min_age" => 18
            ],
            [
                "role_name" => "Yoga Wellness Trainer",
                "code" => "HSS/Q4003",
                "level" => "5",
                "eligibility" => "Certificate Asst Yoga Instructor + 2 yrs exp / 12th + 1 yr exp",
                "min_age" => 18
            ],
            [
                "role_name" => "Cupping Therapist",
                "code" => "HSS/Q4102",
                "level" => "6",
                "eligibility" => "PG (AYUSH) / MBBS / BAMS / BNYS / BUMS / Physiotherapy",
                "min_age" => 21
            ],
            [
                "role_name" => "General Duty Assistant (GDA)",
                "code" => "HSS/Q5101",
                "level" => "3 - 4",
                "eligibility" => "10th Class pass (or 8th pass + 2 yrs experience)",
                "min_age" => 18
            ],
            [
                "role_name" => "Home Health Aide",
                "code" => "HSS/Q5102",
                "level" => "3",
                "eligibility" => "10th Class pass (or 8th pass + 2 yrs experience)",
                "min_age" => 18
            ],
            [
                "role_name" => "Telehealth Services Coordinator",
                "code" => "HSS/Q5801",
                "level" => "4",
                "eligibility" => "12th Class / ANM / MPW + 2 yrs exp, or 10th + 2-yr ITI",
                "min_age" => 18
            ],
            [
                "role_name" => "Geriatric Caregiver (Inst & Home)",
                "code" => "HSS/Q6002",
                "level" => "3 - 4",
                "eligibility" => "10th + ITI / 12th pass / NSQF Level 3 certified",
                "min_age" => 20
            ],
            [
                "role_name" => "Hospital Front Desk Coordinator",
                "code" => "HSS/Q6101",
                "level" => "4",
                "eligibility" => "12th Class, or 10th + 2 yrs experience",
                "min_age" => 18
            ],
            [
                "role_name" => "Healthcare Quality Assurance Mgr",
                "code" => "HSS/Q6106",
                "level" => "6",
                "eligibility" => "MBBS / BHMS / BAMS / BDS / Post Graduate Healthcare Admin + 3 yrs",
                "min_age" => 25
            ],
            [
                "role_name" => "CSSD Assistant",
                "code" => "HSS/Q6201",
                "level" => "4",
                "eligibility" => "12th Science / 10th + 2 yrs exp / NSQF Level 3",
                "min_age" => 18
            ]
        ]
    ],
    [
        "id" => "management-security",
        "section_num" => 7,
        "title" => "Management, Security, Training & Professional Services",
        "council" => "MEPSC Qualifications",
        "badge" => "MEPSC Aligned",
        "description" => "Office administration, corporate HR & payroll, security management, tax practice, CSR, and accredited VET master training.",
        "columns" => [
            "Sub-Domain / Role",
            "QP Code",
            "Level",
            "Minimum Entry Criteria & Industry Experience"
        ],
        "roles" => [
            [
                "role_name" => "Licensee Security Services",
                "code" => "MEP/M0001",
                "level" => "5",
                "eligibility" => "Graduate + 3 yrs exp, 12th + 5 yrs exp, or 10th + 7 yrs exp in Security"
            ],
            [
                "role_name" => "Secretary",
                "code" => "MEP/Q0201",
                "level" => "4",
                "eligibility" => "12th pass + 4 yrs exp / 10th pass + 4 yrs exp / Diploma holder"
            ],
            [
                "role_name" => "Office Assistant",
                "code" => "MEP/Q0202",
                "level" => "3",
                "eligibility" => "8th Class + 1 yr exp / 8th ITI / 10th grade pass"
            ],
            [
                "role_name" => "Receptionist",
                "code" => "MEP/Q0204",
                "level" => "3",
                "eligibility" => "10th Class pass"
            ],
            [
                "role_name" => "Multifunctional Office Executive",
                "code" => "MEP/Q0205",
                "level" => "4.5",
                "eligibility" => "3-yr UG degree, 12th pass + 3 yrs exp, or 12th + 1-yr NTC + 2 yrs exp"
            ],
            [
                "role_name" => "Field Survey Enumerator",
                "code" => "MEP/Q0206",
                "level" => "4",
                "eligibility" => "8th/10th + 2 yrs exp / 10th + ITI / 12th + 6 months exp"
            ],
            [
                "role_name" => "Office Operations Executive",
                "code" => "MEP/Q0207",
                "level" => "4",
                "eligibility" => "10th + 2 yrs exp / 10th + ITI + 1 yr exp / 12th + 6 months exp"
            ],
            [
                "role_name" => "Hindi Typist",
                "code" => "MEP/Q0210",
                "level" => "4",
                "eligibility" => "10th pass + 2 yrs exp / 10th + ITI / 12th + 6 months exp"
            ],
            [
                "role_name" => "Office Executive",
                "code" => "MEP/Q0211",
                "level" => "4",
                "eligibility" => "12th Class + 0-6 months exp / NSQF Level 3.5 + 1.5 yrs exp"
            ],
            [
                "role_name" => "HR Executive - Payroll & Data Mgt",
                "code" => "MEP/Q0701",
                "level" => "4.5",
                "eligibility" => "UG Certificate / 12th + 2-yr Diploma / NSQF Level 4 + 1-2 yrs exp"
            ],
            [
                "role_name" => "Recruitment Executive",
                "code" => "MEP/Q0702",
                "level" => "4.5",
                "eligibility" => "UG Certificate / 10th pass + 3 yrs VET / NSQF Level 4 + 1-2 yrs exp"
            ],
            [
                "role_name" => "CSR & Sustainability Head",
                "code" => "MEP/Q1101",
                "level" => "6",
                "eligibility" => "PG in Social Work + 6 mos exp / Graduate + 1-3 yrs CSR experience"
            ],
            [
                "role_name" => "CSR & Sustainability Manager",
                "code" => "MEP/Q1103",
                "level" => "5",
                "eligibility" => "Graduate/Diploma + 0-1 yr exp / NSQF Level 4 + 2 yrs in CSR field"
            ],
            [
                "role_name" => "Paralegal Associate - Legal Docs",
                "code" => "MEP/Q1201",
                "level" => "4",
                "eligibility" => "12th Class pass"
            ],
            [
                "role_name" => "Start-up Support Executive",
                "code" => "MEP/Q1202",
                "level" => "4.5",
                "eligibility" => "3-yr Diploma (after 10th) / 10th + NTC + CITS + 1 yr exp"
            ],
            [
                "role_name" => "Trainer (VET and Skills)",
                "code" => "MEP/Q2601",
                "level" => "5",
                "eligibility" => "Certified on domain NSQF L4 or CITS trade certified + 1 yr exp"
            ],
            [
                "role_name" => "Master Trainer (VET and Skills)",
                "code" => "MEP/Q2602",
                "level" => "6",
                "eligibility" => "Certified on domain NSQF L5 + 5 yrs training experience"
            ],
            [
                "role_name" => "Assessor (VET and Skills)",
                "code" => "MEP/Q2701",
                "level" => "5",
                "eligibility" => "Certified on domain NSQF L4 / relevant CITS trade credential"
            ],
            [
                "role_name" => "Consultant (Tax Practitioner)",
                "code" => "MEP/Q5102",
                "level" => "5",
                "eligibility" => "Graduate Commerce / Management / Accounting / Finance"
            ],
            [
                "role_name" => "Public Accountant",
                "code" => "MEP/Q5104",
                "level" => "6",
                "eligibility" => "PG Commerce / 12th Commerce + 4 yrs exp / NSQF Level 5"
            ],
            [
                "role_name" => "Security Supervisor",
                "code" => "MEP/Q7201",
                "level" => "4",
                "eligibility" => "12th Class + 3 yrs experience as Security Guard / NSQF L3"
            ],
            [
                "role_name" => "Security Officer",
                "code" => "MEP/Q7202",
                "level" => "5",
                "eligibility" => "Graduate + 3 yrs exp as Supervisor / Armed Security Guard"
            ],
            [
                "role_name" => "CCTV Video Footage Auditor",
                "code" => "MEP/Q7204",
                "level" => "4",
                "eligibility" => "10th + ITI, 12th + 6 mos exp, or NSQF L3 + 3 yrs CCTV experience"
            ],
            [
                "role_name" => "Firefighter",
                "code" => "MEP/Q7301",
                "level" => "4",
                "eligibility" => "10th Class pass"
            ]
        ]
    ],
    [
        "id" => "vocational-degree",
        "section_num" => 8,
        "title" => "Vocational Degree Programs (B.Voc & M.Voc Trades)",
        "council" => "UGC & NEP 2020 Framework",
        "badge" => "UGC & NEP 2020 Aligned",
        "description" => "Multi-entry & exit degree paths with industry apprenticeship, lab training, and university equivalence.",
        "policy" => "NEP 2020 Multi-Entry & Multiple Exit Policy => Exit after Sem 1 => Certificate \u2022 Exit after Sem 2 => Diploma \u2022 Exit after Sem 4 => Advanced Diploma \u2022 Exit after Sem 6 => Full B.Voc Degree. At PG level => Exit after Sem 2 => Post Graduate Diploma \u2022 Exit after Sem 4 => Full M.Voc Degree.",
        "columns" => [
            "Sr.",
            "Vocational Trade / Discipline",
            "Approved Specialization",
            "B.Voc / Sem",
            "M.Voc / Sem"
        ],
        "trades" => [
            [
                "sr" => 1,
                "trade" => "Paramedical & Health Admin",
                "specialization" => "Hospital Sterilization",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 2,
                "trade" => "Physiotherapy",
                "specialization" => "General & Sports Rehab",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 3,
                "trade" => "Critical Care Management",
                "specialization" => "Intensive Care Operations",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 4,
                "trade" => "Medical Image Technology",
                "specialization" => "Radiology & Imaging",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 5,
                "trade" => "Patient Care Management",
                "specialization" => "Dialysis / OT / CMSED / Dental / Optometry",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 6,
                "trade" => "Medical Laboratory Technology (MLT)",
                "specialization" => "Molecular Diagnostics & Lab Analysis",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 7,
                "trade" => "Yogic Science & Naturopathy",
                "specialization" => "Therapeutic & Clinical Yoga",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 8,
                "trade" => "Artificial Intelligence & Data Analytics",
                "specialization" => "Machine Learning & Big Data",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 9,
                "trade" => "Internet of Things (IoT)",
                "specialization" => "Connected Devices & Hardware",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 10,
                "trade" => "Information Technology",
                "specialization" => "Web Technologies & Multimedia",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 11,
                "trade" => "Software Dev & Systems Admin",
                "specialization" => "Cloud & Enterprise Systems",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 12,
                "trade" => "Cyber Crime & Security",
                "specialization" => "Cyber Forensics & Incident Response",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 13,
                "trade" => "E-Commerce & Digital Marketing",
                "specialization" => "Growth Architecture & SEO",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 14,
                "trade" => "Digital Media & Animation",
                "specialization" => "Visual Effects & Graphic Design",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 15,
                "trade" => "Banking & Financial Services",
                "specialization" => "Retail Banking & FinTech",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 16,
                "trade" => "Management & Entrepreneurship",
                "specialization" => "Retail / Airport & Airline / Logistics / Hospital",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 17,
                "trade" => "Textile Design",
                "specialization" => "Apparel & Fashion Technologies",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 18,
                "trade" => "Beauty Therapy and Aesthetics",
                "specialization" => "Advanced Cosmetology & Clinical Skin Care",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 19,
                "trade" => "Food Processing",
                "specialization" => "Post-Harvest & Industrial Baking",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 20,
                "trade" => "Automobiles",
                "specialization" => "EV Technology & Mechanical Systems",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 21,
                "trade" => "Solar Energy",
                "specialization" => "Photovoltaic Installation & Grid Systems",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 22,
                "trade" => "Livestock Production & Management",
                "specialization" => "Dairy & Piggery Operations",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 23,
                "trade" => "Agriculture & Horticulture",
                "specialization" => "Crop Production & Precision Farming",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ],
            [
                "sr" => 24,
                "trade" => "Hotel & Hospitality Management",
                "specialization" => "Tourism, Catering & Guest Services",
                "bvoc_fee" => "\u20b925,000",
                "mvoc_fee" => "\u20b927,500"
            ]
        ]
    ]
];
    }

    /**
     * Get 24 B.Voc & M.Voc Degree Trades under NEP 2020.
     */
    public static function getDegreeTrades(): array
    {
        return [
    [
        "sr" => 1,
        "trade" => "Paramedical & Health Admin",
        "specialization" => "Hospital Sterilization",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 2,
        "trade" => "Physiotherapy",
        "specialization" => "General & Sports Rehab",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 3,
        "trade" => "Critical Care Management",
        "specialization" => "Intensive Care Operations",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 4,
        "trade" => "Medical Image Technology",
        "specialization" => "Radiology & Imaging",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 5,
        "trade" => "Patient Care Management",
        "specialization" => "Dialysis / OT / CMSED / Dental / Optometry",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 6,
        "trade" => "Medical Laboratory Technology (MLT)",
        "specialization" => "Molecular Diagnostics & Lab Analysis",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 7,
        "trade" => "Yogic Science & Naturopathy",
        "specialization" => "Therapeutic & Clinical Yoga",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 8,
        "trade" => "Artificial Intelligence & Data Analytics",
        "specialization" => "Machine Learning & Big Data",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 9,
        "trade" => "Internet of Things (IoT)",
        "specialization" => "Connected Devices & Hardware",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 10,
        "trade" => "Information Technology",
        "specialization" => "Web Technologies & Multimedia",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 11,
        "trade" => "Software Dev & Systems Admin",
        "specialization" => "Cloud & Enterprise Systems",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 12,
        "trade" => "Cyber Crime & Security",
        "specialization" => "Cyber Forensics & Incident Response",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 13,
        "trade" => "E-Commerce & Digital Marketing",
        "specialization" => "Growth Architecture & SEO",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 14,
        "trade" => "Digital Media & Animation",
        "specialization" => "Visual Effects & Graphic Design",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 15,
        "trade" => "Banking & Financial Services",
        "specialization" => "Retail Banking & FinTech",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 16,
        "trade" => "Management & Entrepreneurship",
        "specialization" => "Retail / Airport & Airline / Logistics / Hospital",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 17,
        "trade" => "Textile Design",
        "specialization" => "Apparel & Fashion Technologies",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 18,
        "trade" => "Beauty Therapy and Aesthetics",
        "specialization" => "Advanced Cosmetology & Clinical Skin Care",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 19,
        "trade" => "Food Processing",
        "specialization" => "Post-Harvest & Industrial Baking",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 20,
        "trade" => "Automobiles",
        "specialization" => "EV Technology & Mechanical Systems",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 21,
        "trade" => "Solar Energy",
        "specialization" => "Photovoltaic Installation & Grid Systems",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 22,
        "trade" => "Livestock Production & Management",
        "specialization" => "Dairy & Piggery Operations",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 23,
        "trade" => "Agriculture & Horticulture",
        "specialization" => "Crop Production & Precision Farming",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ],
    [
        "sr" => 24,
        "trade" => "Hotel & Hospitality Management",
        "specialization" => "Tourism, Catering & Guest Services",
        "bvoc_fee" => "\u20b925,000",
        "mvoc_fee" => "\u20b927,500"
    ]
];
    }

    /**
     * Total number of certified roles across all sectors.
     */
    public static function getTotalRolesCount(): int
    {
        $count = 0;
        foreach (self::getSectors() as $sec) {
            if (isset($sec['roles'])) {
                $count += count($sec['roles']);
            }
            if (isset($sec['trades'])) {
                $count += count($sec['trades']);
            }
        }
        return $count;
    }
}
