<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmed</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background-color: #27ae60;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        
        .header-icon {
            width: 70px;
            height: 70px;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 0 auto 15px;
            font-size: 40px;
            color: #27ae60;
            padding: 5px;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.95;
        }
        
        .content {
            padding: 35px 30px;
            border: 1px solid #e0e0e0;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333333;
        }
        
        .confirmation-message {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .confirmation-message h2 {
            color: #155724;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .confirmation-message p {
            color: #155724;
            line-height: 1.6;
            font-size: 15px;
        }
        
        .appointment-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 25px;
            margin: 25px 0;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .appointment-card h3 {
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 15px;
            font-size: 15px;
            align-items: flex-start;
        }
        
        .detail-row:last-child {
            margin-bottom: 0;
        }
        
        .detail-icon {
            width: 35px;
            flex-shrink: 0;
            font-size: 18px;
        }
        
        .detail-content {
            flex: 1;
        }
        
        .detail-label {
            font-weight: bold;
            font-size: 13px;
            opacity: 0.9;
            display: block;
            margin-bottom: 3px;
            color: #ffffff;
        }
        
        .detail-value {
            font-size: 16px;
            font-weight: 500;
            color: #ffffff;
        }
        
        .action-buttons {
            text-align: center;
            margin: 30px 0;
        }
        
        .button {
            display: inline-block;
            padding: 14px 32px;
            margin: 8px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .button-primary {
            background-color: #3498db;
            color: #ffffff;
        }
        
        .button-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }
        
        .button-secondary {
            background-color: #ffffff;
            color: #555555;
            border: 2px solid #e0e0e0;
        }
        
        .button-secondary:hover {
            border-color: #3498db;
            color: #3498db;
        }
        
        .info-section {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .info-section h3 {
            color: #856404;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .info-section ul {
            margin-left: 20px;
            color: #856404;
        }
        
        .info-section li {
            margin-bottom: 8px;
            line-height: 1.5;
        }
        
        .preparation-box {
            background-color: #e7f3ff;
            border: 1px solid #b3d7ff;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .preparation-box h3 {
            color: #0056b3;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .preparation-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            color: #004085;
        }
        
        .preparation-item:last-child {
            margin-bottom: 0;
        }
        
        .check-icon {
            color: #28a745;
            font-weight: bold;
            margin-right: 10px;
            font-size: 16px;
        }

        .contact-section {
            background-color: #f8f9fa;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
            text-align: center;
        }
        
        .contact-section h3 {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .contact-info {
            color: #555555;
            font-size: 15px;
            line-height: 1.8;
        }
        
        .contact-info strong {
            color: #2c3e50;
        }
        
        .contact-box {
            background-color: #f8f9fa;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
            text-align: center;
        }
        
        .contact-box h3 {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .contact-methods {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 15px;
        }
        
        .contact-method {
            text-align: center;
        }
        
        .contact-method-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .contact-method-label {
            font-size: 12px;
            color: #777777;
            margin-bottom: 5px;
        }
        
        .contact-method-value {
            font-size: 14px;
            color: #2c3e50;
            font-weight: bold;
        }
        
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 25px 0;
        }
        
        .footer {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 25px 20px;
            text-align: center;
        }
        
        .footer p {
            font-size: 13px;
            margin-bottom: 8px;
            opacity: 0.9;
        }
        
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }
            
            .content {
                padding: 25px 20px;
                border: 1px solid #e0e0e0;
            }
            
            .button {
                display: block;
                margin: 10px 0;
            }
            
            .contact-methods {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">✓</div>
            <h1>Appointment Confirmed!</h1>
            <p>Your appointment has been successfully scheduled</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <p class="greeting">Dear {{ $appointment->user->first_name .' '. $appointment->user->last_name }},</p>
            
            <div class="confirmation-message">
                <h2>✓ Great News! Your Appointment is Confirmed</h2>
                <p>We're looking forward to seeing you. Your appointment has been scheduled and confirmed. Please review the details below and save this email for your records.</p>
            </div>
            
            <!-- Appointment Card -->
            <div class="appointment-card">
                <h3>📅 Your Appointment Details</h3>
                
                <div class="detail-row">
                    <div class="detail-icon">🆔</div>
                    <div class="detail-content">
                        <span class="detail-label">APPOINTMENT ID</span>
                        <div class="detail-value">#{{ $appointment->id }}</div>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-icon">📆</div>
                    <div class="detail-content">
                        <span class="detail-label">DATE</span>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($appointment->date)->format('l, F d, Y') }}</div>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-icon">🕒</div>
                    <div class="detail-content">
                        <span class="detail-label">TIME</span>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($appointment->schedule->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment->schedule->end_time)->format('g:i A') }}</div>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-icon">💼</div>
                    <div class="detail-content">
                        <span class="detail-label">SERVICE</span>
                        <div class="detail-value">{{ $appointment->service?->title }}</div>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-icon">👤</div>
                    <div class="detail-content">
                        <span class="detail-label">WITH</span>
                        <div class="detail-value">{{ $appointment->consultain?->name }}</div>
                    </div>
                </div>
                
                @if ($appointment->notes)
                <div class="detail-row">
                    <div class="detail-icon">📝</div>
                    <div class="detail-content">
                        <span class="detail-label">NOTES</span>
                        <div class="detail-value">{{ $appointment->notes }}</div>
                    </div>
                </div>
                @endif
            </div>
             
            
            <!-- Preparation Info -->
            <div class="preparation-box">
                <h3>📋 Before Your Appointment</h3>
                <div class="preparation-item">
                    <span class="check-icon">✓</span>
                    <span>Arrive 10-15 minutes early to complete any necessary paperwork</span>
                </div>
                <div class="preparation-item">
                    <span class="check-icon">✓</span>
                    <span>Prepare any questions or concerns you'd like to discuss</span>
                </div>
            </div>
            
            <!-- Important Info -->
            <div class="info-section">
                <h3>⚠️ Important Information</h3>
                <ul>
                    <li><strong>Cancellation Policy:</strong> Please notify us at least 24 hours in advance if you need to cancel or reschedule</li>
                </ul>
            </div>
            
            <div class="divider"></div>
            
            <!-- Contact Section -->
            <div class="contact-section">
                <h3>Need Immediate Assistance?</h3>
                <div class="contact-info">
                    If you need to speak with someone right away or<br>
                    have urgent questions, please contact us:<br><br>
                    <strong>Phone:</strong> {{$info->phone}}<br>
                    <strong>Email:</strong> {{$info->email}}<br>
                    <strong>Hours:</strong> {{$info->business_hours}}
                </div>
            </div>
            
            <div class="divider"></div>
            
            <p style="color: #555555; line-height: 1.6; font-size: 14px;">
                We're committed to providing you with excellent service. If you have any questions or special requirements, please don't hesitate to reach out before your appointment.
            </p>
            
            <p style="margin-top: 20px; color: #555555; font-size: 14px;">
                We look forward to seeing you!<br><br>
                Best regards,<br>
                <strong>{{ $info->title }}</strong>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>{{ $info->title }}</strong></p>
            <p>{{ $info->address }}</p>
            <p>Phone: {{ $info->phone }} | Email: {{ $info->email }}</p>
            <p style="margin-top: 15px;">
                <a href="{{route('home')}}">Visit our website</a> | 
                <a href="{{route('about')}}">About Us</a> | 
                <a href="{{route('contact')}}">Contact Us</a>
            </p>
            <p style="margin-top: 15px; font-size: 12px;">
                This email was sent to confirm your appointment. Please do not reply directly to this email.
            </p>
        </div>
    </div>
</body>
</html>