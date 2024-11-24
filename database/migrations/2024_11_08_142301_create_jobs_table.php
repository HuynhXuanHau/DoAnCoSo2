<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('area', 50);
            $table->string('language', 50);
            $table->string('experience', 20);
            $table->string('salary', 20);
            $table->string('position', 100);
            $table->string('description', 2000);
            $table->string('address', 1000);
            $table->string('worktime', 20);
            $table->string('availableApply', 20);
            $table->string('benefits', 1500);
            $table->string('img', 100);
            $table->timestamps();
        });

        // Insert sample data
        DB::table('jobs')->insert([
            [
                'name' => 'FPT',
                'area' => 'Quan 1',
                'language' => 'Java',
                'experience' => '1-2 năm',
                'salary' => '1000$',
                'position' => 'FPT Solfware',
                'description' => 'Work closely with the product team to involve in new systems development, enhancements and maintenance to existing applications to ensure alignment with business objectivesrn-Responsible for programming, problem resolution and user support for one or more system applicationsrnPlan, execute, and monitor projects assigned to ensure deliverables are within scope, resources, budget and schedulern-Responsible for guiding teams of senior and junior developers in their daily workrnEnsure codes are written to industry standards in terms of security and designrnMaintains version control with the team using Gitrn-Manages deliverables with the Agile/ SCRUM methodology (on the JIRA platform)rnResponsible for setting up, maintaining and deploying different environments including but not limited to Development, Staging, and Production in a Microservice ArchitecturernPrepares technical and user documentation',
                'address' => '12 Quan 1',
                'worktime' => 'Part-time',
                'availableApply' => '12/5/2023',
                'benefits' => 'Lương CB từ 7.300.000 đến 13.800.000 + commision',
                'img' => '../images/logo_fpt.png'
            ],
            [
                'name' => 'F88',
                'area' => 'Quan 10',
                'language' => 'Python',
                'experience' => '2 - 3 năm',
                'salary' => '10000$',
                'position' => 'Software Deveploper',
                'description' => 'Tham gia xây dựng kế hoạch thực hiện tích hợp/chuyển đổi hệ thống.rn-Tham gia xây dựng tài liệu thiết kế kỹ thuật, Tham mưu giải pháp tích hợp hệ thống.rn-Tham mưu và đề xuất phương án cải tiến nhằm nâng cao khả năng chịu tải và an toàn cho các kết nối giữa các hệ thống với nhau.rn-Lập trình tích hợp, kiểm tra, sửa lỗi các hệ thống theo kế hoạch đảm bảo tuân thủ theo quy trình nghiệp vụ, tiến độ, tiêu chuẩn, chất lượng, sản phẩm CNTT.',
                'address' => '142 Quan 10 tp HCM',
                'worktime' => 'Full-time',
                'availableApply' => '12/5/2023',
                'benefits' => 'lương cao',
                'img' => '../images/logo_F88.PNG'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};