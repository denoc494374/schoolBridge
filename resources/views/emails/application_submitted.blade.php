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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
        .success-card {
            background: #d1fae5;
            border-left: 4px solid #10b981;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .success-card p {
            margin: 0;
            color: #065f46;
            font-weight: 500;
            font-size: 14px;
        }
        .application-details {
            background: #f8f8fc;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .detail-row {
            margin-bottom: 18px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e8e8f0;
        }
        .detail-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .detail-label {
            color: #666;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        .detail-value {
            color: #1a1a2e;
            font-size: 15px;
            font-weight: 500;
        }
        .status-badge {
            display: inline-block;
            background: #dbeafe;
            color: #0c2d6b;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        .next-steps {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            border-left: 4px solid #2563eb;
        }
        .next-steps h3 {
            margin: 0 0 12px 0;
            color: #1565c0;
            font-size: 14px;
            font-weight: 600;
        }
        .next-steps ol {
            margin: 0;
            padding-left: 20px;
            color: #1565c0;
            font-size: 14px;
        }
        .next-steps li {
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .important-note {
            background: #fef3c7;
            padding: 16px;
            border-radius: 8px;
            margin: 25px 0;
            border-left: 4px solid #f59e0b;
        }
        .important-note h4 {
            margin: 0 0 8px 0;
            color: #92400e;
            font-size: 14px;
            font-weight: 600;
        }
        .important-note p {
            margin: 0;
            color: #92400e;
            font-size: 13px;
            line-height: 1.6;
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
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Application Submitted Successfully</h1>
            <p>Your scholarship application has been received</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Hi {{ $application->student->name }},</p>

            <p style="color: #1a1a2e; margin-bottom: 20px;">
                Great news! Your application for <strong>{{ $application->scholarship->title }}</strong> has been successfully submitted. We have received all your documents and information.
            </p>

            <!-- Success Alert -->
            <div class="success-card">
                <p>✨ Your application is now under review. You will be notified of any updates via email.</p>
            </div>

            <!-- Application Details -->
            <div class="application-details">
                <div class="detail-row">
                    <div class="detail-label">📚 Scholarship Name</div>
                    <div class="detail-value">{{ $application->scholarship->title }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">🏢 Organization</div>
                    <div class="detail-value">{{ $application->scholarship->organization->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Application Date</div>
                    <div class="detail-value">{{ $application->submitted_at->format('F j, Y') }} at {{ $application->submitted_at->format('h:i A') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Current Status</div>
                    <div>
                        <span class="status-badge">Pending Review</span>
                    </div>
                </div>
                @if($application->remarks)
                <div class="detail-row">
                    <div class="detail-label">💬 Your Remarks</div>
                    <div class="detail-value">{{ $application->remarks }}</div>
                </div>
                @endif
            </div>

            <!-- Important Note -->
            <div class="important-note">
                <h4>Important Information:</h4>
                <p>{{ $application->scholarship->organization->name }} will review your application and contact you via email with updates. Make sure to check your inbox and spam folder regularly for important notifications.</p>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3>What Happens Next?</h3>
                <ol>
                    <li><strong>Review Period:</strong> Your application will be reviewed by the scholarship organization.</li>
                    <li><strong>Status Updates:</strong> We'll notify you of any changes to your application status.</li>
                    <li><strong>Acceptance/Rejection:</strong> You'll receive notification of the final decision.</li>
                    <li><strong>Next Steps:</strong> If approved, you'll receive further instructions.</li>
                </ol>
            </div>

            <center>
                <a href="{{ url('/dashboard') }}" class="cta-button">View Your Dashboard</a>
            </center>

            <p style="color: #666; text-align: center; font-size: 14px; margin-top: 30px;">
                If you have any questions or concerns about your application, please contact {{ $application->scholarship->organization->name }} directly or visit your dashboard for more information.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 12px 0;">
                © 2026 ScholarBridge. All rights reserved.
            </p>
            <p style="margin: 0;">
                You received this email because you submitted a scholarship application on ScholarBridge.
            </p>
        </div>
    </div>
</body>
</html>
