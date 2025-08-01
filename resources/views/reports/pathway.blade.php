<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pathway Report - {{ $response->user->name }}</title>
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #D95D39;
        }
        .header h1 {
            color: #0D1F3C;
            font-size: 24px;
            margin: 0;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            color: #D95D39;
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 1px solid #D95D39;
            padding-bottom: 5px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #D95D39;
        }
        .info-item strong {
            color: #0D1F3C;
        }
        .skills-list, .interests-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }
        .skill-tag, .interest-tag {
            background: #D95D39;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        .recommendations {
            margin-top: 30px;
        }
        .program-item, .opportunity-item {
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border-left: 4px solid #0D1F3C;
        }
        .program-item h3, .opportunity-item h3 {
            color: #0D1F3C;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .program-details, .opportunity-details {
            font-size: 14px;
            color: #666;
        }
        .next-steps {
            background: #e8f4fd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .next-steps h2 {
            color: #0D1F3C;
            margin-top: 0;
        }
        .next-steps ol {
            margin: 0;
            padding-left: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Personalized Pathway Report</h1>
        <p>Generated for {{ $response->user->name }} on {{ $response->created_at->format('F j, Y') }}</p>
    </div>

    <div class="section">
        <h2>Academic Background</h2>
        <div class="info-grid">
            <div class="info-item">
                <strong>Academic Background:</strong><br>
                {{ $response->academic_background }}
            </div>
            <div class="info-item">
                <strong>Field of Interest:</strong><br>
                {{ $response->field_of_interest }}
            </div>
        </div>
    </div>

    <div class="section">
        <h2>Career Goals & Aspirations</h2>
        <div class="info-item">
            <strong>Career Goals:</strong><br>
            {{ $response->career_goals }}
        </div>
        <div class="info-item" style="margin-top: 15px;">
            <strong>Personal Aspirations:</strong><br>
            {{ $response->aspirations }}
        </div>
    </div>

    @if($response->skills)
    <div class="section">
        <h2>Skills</h2>
        <div class="skills-list">
            @foreach($response->skills as $skill)
                <span class="skill-tag">{{ $skill }}</span>
            @endforeach
        </div>
    </div>
    @endif

    @if($response->interests)
    <div class="section">
        <h2>Interests</h2>
        <div class="interests-list">
            @foreach($response->interests as $interest)
                <span class="interest-tag">{{ $interest }}</span>
            @endforeach
        </div>
    </div>
    @endif

    @if($response->preferred_location || $response->budget_range_min)
    <div class="section">
        <h2>Preferences</h2>
        <div class="info-grid">
            @if($response->preferred_location)
            <div class="info-item">
                <strong>Preferred Location:</strong><br>
                {{ $response->preferred_location }}
            </div>
            @endif
            @if($response->budget_range_min && $response->budget_range_max)
            <div class="info-item">
                <strong>Budget Range:</strong><br>
                {{ $response->currency }} {{ number_format($response->budget_range_min) }} - {{ number_format($response->budget_range_max) }}
            </div>
            @endif
        </div>
    </div>
    @endif

    <div class="recommendations">
        <h2>Recommended Programs</h2>
        @if($response->recommended_programs && count($response->recommended_programs) > 0)
            @foreach($response->recommended_programs as $program)
                <div class="program-item">
                    <h3>{{ $program['name'] }}</h3>
                    <div class="program-details">
                        <strong>Institution:</strong> {{ $program['institution'] }}<br>
                        <strong>Location:</strong> {{ $program['location'] }}<br>
                        <strong>Duration:</strong> {{ $program['duration_months'] }} months<br>
                        <strong>Tuition:</strong> {{ $program['currency'] }} {{ number_format($program['tuition_fee']) }}
                    </div>
                </div>
            @endforeach
        @else
            <p>No specific programs recommended at this time. Please check back later for updates.</p>
        @endif
    </div>

    <div class="recommendations">
        <h2>Recommended Opportunities</h2>
        @if($response->recommended_opportunities && count($response->recommended_opportunities) > 0)
            @foreach($response->recommended_opportunities as $opportunity)
                <div class="opportunity-item">
                    <h3>{{ $opportunity['title'] }}</h3>
                    <div class="opportunity-details">
                        <strong>Organization:</strong> {{ $opportunity['organization'] }}<br>
                        <strong>Type:</strong> {{ $opportunity['type'] }}<br>
                        <strong>Location:</strong> {{ $opportunity['location'] }}<br>
                        @if($opportunity['amount'])
                        <strong>Amount:</strong> {{ $opportunity['currency'] }} {{ number_format($opportunity['amount']) }}
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>No specific opportunities recommended at this time. Please check back later for updates.</p>
        @endif
    </div>

    <div class="next-steps">
        <h2>Next Steps</h2>
        <ol>
            <li>Review the recommended programs and opportunities</li>
            <li>Contact institutions for more information</li>
            <li>Apply for scholarships and opportunities</li>
            <li>Schedule mentorship sessions for guidance</li>
            <li>Stay updated with new opportunities</li>
        </ol>
    </div>

    @if($response->additional_notes)
    <div class="section">
        <h2>Additional Notes</h2>
        <div class="info-item">
            {{ $response->additional_notes }}
        </div>
    </div>
    @endif

    <div class="footer">
        <p>This report was generated by AfayiGuide - Your Pathway to Success</p>
        <p>Generated on {{ $response->created_at->format('F j, Y \a\t g:i A') }}</p>
    </div>
</body>
</html> 