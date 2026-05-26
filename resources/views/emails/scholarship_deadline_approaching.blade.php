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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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
        .warning-card {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .warning-card p {
            margin: 0;
            color: #92400e;
            font-weight: 500;
            font-size: 14px;
            line-height: 1.6;
        }
        .scholarship-details {
            background: #f8f8fc;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
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
            font-size: 14px;
        }
        .detail-value {
            color: #1a1a2e;
            font-weight: 600;
            font-size: 16px;
        }
        .countdown-badge {
            display: inline-block;
            background: #fee2e2;
            color: #7f1d1d;
            padding: 12px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin: 15px 0;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 25px 0;
        }
        .stat-box {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin: 10px 0;
        }
        .stat-label {
            font-size: 12px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin: 30px 0;
        }
        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            display: inline-block;
        }
        .btn-primary {
            background: linear-gradient(135deg, #534AB7 0%, #3C3489 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .btn-secondary {
            background: #e8e8f0;
            color: #1a1a2e;
        }
        .btn-secondary:hover {
            background: #d8d8e0;
            color: #1a1a2e;
            text-decoration: none;
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
            margin-bottom: 8px;
            line-height: 1.6;
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
            <h1>Scholarship Deadline Reminder</h1>
            <p>Your scholarship application deadline is approaching</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Hi {{ $scholarship->organization->name }},</p>

            <p style="color: #1a1a2e; margin-bottom: 15px;">
                This is a friendly reminder that the application deadline for your scholarship is coming up soon. We encourage you to review your scholarship listing and take any necessary actions.
            </p>

            <!-- Warning Alert -->
            <div class="warning-card">
                <p><strong>Action Required:</strong> Your scholarship <strong>{{ $scholarship->title }}</strong> will close on <strong>{{ $scholarship->deadline->format('F j, Y') }} at ' . $scholarship->deadline->format('h:i A') . '</strong></p>
            </div>

            <!-- Scholarship Details -->
            <div class="scholarship-details">
                <div class="detail-row">
                    <div class="detail-label">Scholarship Name</div>
                    <div class="detail-value">{{ $scholarship->title }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">📅 Deadline</div>
                    <div class="detail-value">{{ $scholarship->deadline->format('F j, Y') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">⏱️ Time</div>
                    <div class="detail-value">{{ $scholarship->deadline->format('h:i A') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Available Slots</div>
                    <div class="detail-value">{{ $scholarship->slots }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Status</div>
                    <div class="detail-value">{{ ucfirst($scholarship->status) }}</div>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-box">
                    <div class="stat-label">Days Left</div>
                    <div class="stat-value">{{ $scholarship->deadline->diffInDays(now()) }}</div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Available Slots</div>
                    <div class="stat-value">{{ $scholarship->slots }}</div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3>What You Can Do:</h3>
                <ol>
                    <li><strong>Review Your Listing:</strong> Make sure all scholarship details are accurate and complete.</li>
                    <li><strong>Monitor Applications:</strong> Check how many applications you've received.</li>
                    <li><strong>Extend or Close:</strong> If needed, you can extend the deadline or close the scholarship early.</li>
                    <li><strong>Start Reviewing:</strong> Begin evaluating applications from eligible candidates.</li>
                </ol>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ url('/provider/scholarships') }}" class="btn btn-primary">View Scholarship</a>
                <a href="{{ url('/provider/applications') }}" class="btn btn-primary">View Applications</a>
            </div>

            <p style="color: #666; text-align: center; font-size: 13px; margin-top: 30px;">
                If you have any questions or need assistance, please don't hesitate to contact our support team.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 12px 0;">
                © 2026 ScholarBridge. All rights reserved.
            </p>
            <p style="margin: 0;">
                This is an automated reminder. Please don't reply to this email.
            </p>
        </div>
    </div>
</body>
</html>
