<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f8f8fc;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #534AB7 0%, #3C3489 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #1a1a2e;
        }
        .status-card {
            background: #f8f8fc;
            border-left: 4px solid #534AB7;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .status-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #666;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .status-value {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
            margin-top: 12px;
        }
        .status-badge.approved {
            background: #d1fae5;
            color: #065f46;
        }
        .status-badge.rejected {
            background: #fee2e2;
            color: #7f1d1d;
        }
        .status-badge.shortlisted {
            background: #fef3c7;
            color: #92400e;
        }
        .status-badge.pending {
            background: #dbeafe;
            color: #0c2d6b;
        }
        .remarks-section {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .remarks-title {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #666;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .remarks-text {
            color: #1a1a2e;
            line-height: 1.8;
            font-size: 14px;
        }
        .app-details {
            background: #f8f8fc;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .detail-row {
            margin-bottom: 15px;
            font-size: 14px;
        }
        .detail-row:last-child {
            margin-bottom: 0;
        }
        .detail-label {
            color: #666;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .detail-value {
            color: #1a1a2e;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #534AB7 0%, #3C3489 100%);
            color: white;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin: 25px 0;
            transition: transform 0.2s;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .footer {
            background: #f8f8fc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e8e8f0;
            color: #666;
            font-size: 12px;
        }
        .footer a {
            color: #534AB7;
            text-decoration: none;
        }
        .divider {
            border: none;
            border-top: 1px solid #e8e8f0;
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Application Status Update</h1>
            <p>Your scholarship application has been reviewed</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Hi {{ $application->student->name }},</p>

            <p style="color: #1a1a2e; margin-bottom: 25px;">
                We're writing to let you know about an update to your scholarship application for <strong>{{ $application->scholarship->title }}</strong>.
            </p>

            <!-- Application Details -->
            <div class="app-details">
                <div class="detail-row">
                    <div class="detail-label">📚 Scholarship</div>
                    <div class="detail-value">{{ $application->scholarship->title }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">🏢 Organization</div>
                    <div class="detail-value">{{ $application->scholarship->organization->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">📅 Application Date</div>
                    <div class="detail-value">{{ $application->submitted_at->format('F j, Y \a\t h:i A') }}</div>
                </div>
            </div>

            <!-- Status Update -->
            <div class="status-card">
                <div class="status-label">Application Status</div>
                <div class="status-value">
                    From: {{ ucfirst($oldStatus) }} <span style="opacity: 0.5;">→</span> To: <strong>{{ ucfirst($application->status) }}</strong>
                </div>
                <span class="status-badge {{ strtolower($application->status) }}">
                    {{ ucfirst($application->status) }}
                </span>
            </div>

            <!-- Remarks -->
            @if($application->remarks)
                <div class="remarks-section">
                    <div class="remarks-title">💬 Remarks from the Organization</div>
                    <div class="remarks-text">
                        {{ $application->remarks }}
                    </div>
                </div>
            @endif

            <!-- Next Steps -->
            <div style="background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 25px 0; border-left: 4px solid #2563eb;">
                <div style="color: #1565c0; font-weight: 600; margin-bottom: 8px;">What's Next?</div>
                @if($application->status === 'approved')
                    <p style="margin: 0; color: #1565c0; font-size: 14px;">Congratulations! Your application has been approved. Please check your dashboard for further instructions and next steps.</p>
                @elseif($application->status === 'shortlisted')
                    <p style="margin: 0; color: #1565c0; font-size: 14px;">Great news! Your application has been shortlisted. You may be contacted for further information or interviews.</p>
                @elseif($application->status === 'rejected')
                    <p style="margin: 0; color: #1565c0; font-size: 14px;">Thank you for your interest. While your application was not selected this time, we encourage you to apply for other scholarship opportunities.</p>
                @else
                    <p style="margin: 0; color: #1565c0; font-size: 14px;">Your application is being reviewed. We'll notify you as soon as there's an update.</p>
                @endif
            </div>

            <center>
                <a href="{{ url('/dashboard') }}" class="cta-button">View Your Application</a>
            </center>

            <p style="color: #666; text-align: center; font-size: 14px; margin-top: 30px;">
                If you have any questions, please don't hesitate to contact us.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 12px 0;">
                © 2026 ScholarBridge. All rights reserved.
            </p>
            <p style="margin: 0;">
                You received this email because you have an account with ScholarBridge.
            </p>
        </div>
    </div>
</body>
</html>
