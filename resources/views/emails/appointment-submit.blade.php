<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Request Received</title>
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
            background-color: #3498db;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        
        .header-icon {
            width: 60px;
            height: 60px;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #3498db;
            padding: 7px 18px;
        }
        
        .header h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 15px;
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
        
        .success-message {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .success-message h2 {
            color: #155724;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .success-message p {
            color: #155724;
            line-height: 1.6;
            font-size: 14px;
        }
        
        .request-details {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .request-details h3 {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 15px;
        }
        
        .detail-row:last-child {
            margin-bottom: 0;
        }
        
        .detail-label {
            font-weight: bold;
            color: #2c3e50;
            width: 160px;
            flex-shrink: 0;
        }
        
        .detail-value {
            color: #555555;
        }
        
        .info-box {
            background-color: #e7f3ff;
            border: 1px solid #b3d7ff;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .info-box h3 {
            color: #0056b3;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .info-box p {
            color: #004085;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .info-box p:last-child {
            margin-bottom: 0;
        }
        
        .timeline {
            background-color: #fff9e6;
            border: 1px solid #ffd966;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .timeline h3 {
            color: #856404;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .timeline-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
        .timeline-number {
            background-color: #ffc107;
            color: #000000;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            flex-shrink: 0;
            margin-right: 12px;
            padding: 4px 10px
        }
        
        .timeline-text {
            color: #856404;
            font-size: 14px;
            line-height: 1.5;
            padding-top: 3px;
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
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">✓</div>
            <h1>Request Received!</h1>
            <p>We've received your appointment request</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <p class="greeting">Dear {{ $appointment->user->first_name .' '. $appointment->user->last_name }},</p>
            
            <div class="success-message">
                <h2>✓ Appointment Request Submitted Successfully</h2>
                <p>Thank you for submitting your appointment request. We have received your information and a member of our team will review it shortly.</p>
            </div>
            
            <!-- Request Details -->
            <div class="request-details">
                <h3>Your Appointment Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Appointment ID:</span>
                    <span class="detail-value">#{{ $appointment->id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Submitted On:</span>
                    <span class="detail-value">{{ $appointment->created_at->format('F d, Y \a\t g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Date:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->date)->format('l, F d, Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Time:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->schedule->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment->schedule->end_time)->format('g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Service:</span>
                    <span class="detail-value">{{ $appointment->service?->title }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Consultant:</span>
                    <span class="detail-value">{{ $appointment->consultain?->name }}</span>
                </div>
            </div>
            
            <!-- What Happens Next -->
            <div class="info-box">
                <h3>What Happens Next?</h3>
                <p><strong>A representative from our team will contact you within 24-48 hours</strong> to confirm your appointment request and finalize the details.</p>
                <p>We will reach out via phone or email to discuss availability and answer any questions you may have.</p>
            </div>
            
            <!-- Timeline -->
            <div class="timeline">
                <h3>Expected Timeline</h3>
                <div class="timeline-item">
                    <div class="timeline-number">1</div>
                    <div class="timeline-text"><strong>Now:</strong> Your request has been received and is in our system</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-number">2</div>
                    <div class="timeline-text"><strong>Within 24-48 hours:</strong> Our representative will contact you</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-number">3</div>
                    <div class="timeline-text"><strong>After confirmation:</strong> You'll receive a final appointment confirmation email</div>
                </div>
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
                Please keep this email for your records. You may reference your Appointment ID (#{{$appointment->id}}) when contacting us.
            </p>
            
            <p style="margin-top: 20px; color: #555555; font-size: 14px;">
                Thank you for choosing us!<br><br>
                Best regards,<br>
                <strong>{{ $info->title }}</strong>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>{{ $info->title }}</strong></p>
            <p>{{ $info->address }}</p>
            <p>Phone: {{$info->phone}} | Email: {{$info->email}}</p>
            <p style="margin-top: 15px;">
                <a href="{{route('home')}}">Visit our website</a> | 
                <a href="{{route('about')}}">About Us</a> | 
                <a href="{{route('contact')}}">Contact Us</a>
            </p>
        </div>
    </div>
</body>
</html>