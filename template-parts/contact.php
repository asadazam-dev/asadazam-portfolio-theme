<?php
/**
 * Contact Section
 *
 * Final CTA + contact channels. Pulls dynamic contact info from ACF Options
 * so they're editable from one place (and propagate to the WhatsApp button,
 * mailto links, etc.).
 *
 * @package AsadAzam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$email      = asadazam_option( 'contact_email', 'asadazam639@gmail.com' );
$whatsapp   = asadazam_option( 'contact_whatsapp', '923015651810' );
$phone      = asadazam_option( 'contact_phone', '+92 301 5651810' );
$linkedin   = asadazam_option( 'contact_linkedin', 'https://linkedin.com/in/asad-azam-518a5a236/' );

$wa_url     = asadazam_whatsapp_url();
$mail_url   = asadazam_mailto_url( 'Inquiry — WordPress role/project' );
?>

<section class="contact" id="contact">
	<div class="wrap">
		<div class="contact__inner">

			<span class="section-tag reveal" style="justify-content: center; margin-bottom: 0;">
				<?php esc_html_e( 'Let\'s work together', 'asadazam' ); ?>
			</span>

			<h2 class="contact__title reveal"><?php
				echo wp_kses_post( __( 'Hiring? Have a <em>project</em>? Let\'s talk.', 'asadazam' ) );
			?></h2>

			<p class="contact__sub reveal">
				<?php
				echo wp_kses_post(
					__( 'Open to <strong>senior WordPress full-time roles</strong> (remote &amp; on-site) and select <strong>freelance WooCommerce projects</strong>. Typical reply within 12 hours. The best inquiries include a short summary of the role or project and your timeline.', 'asadazam' )
				);
				?>
			</p>

			<div class="contact__cta-row reveal">
				<a href="<?php echo esc_url( $mail_url ); ?>" class="btn btn--primary">
					<?php esc_html_e( 'Get in touch', 'asadazam' ); ?>
					<svg class="btn__arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</a>
				<a href="<?php echo esc_url( $wa_url ); ?>" target="_blank" rel="noopener" class="btn btn--ghost">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
					<?php esc_html_e( 'WhatsApp me', 'asadazam' ); ?>
				</a>
			</div>

			<div class="contact__channels reveal">

				<a href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>" class="contact__channel">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
					<span class="contact__channel-label"><?php esc_html_e( 'Email', 'asadazam' ); ?></span>
					<span class="contact__channel-value"><?php echo esc_html( antispambot( $email ) ); ?></span>
				</a>

				<a href="<?php echo esc_url( 'https://wa.me/' . $whatsapp ); ?>" target="_blank" rel="noopener" class="contact__channel">
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
					<span class="contact__channel-label"><?php esc_html_e( 'WhatsApp', 'asadazam' ); ?></span>
					<span class="contact__channel-value"><?php echo esc_html( $phone ); ?></span>
				</a>

				<a href="<?php echo esc_url( 'tel:+' . preg_replace( '/[^0-9]/', '', $whatsapp ) ); ?>" class="contact__channel">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.8 12.8 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.8 12.8 0 002.81.7A2 2 0 0122 16.92z"/></svg>
					<span class="contact__channel-label"><?php esc_html_e( 'Call', 'asadazam' ); ?></span>
					<span class="contact__channel-value"><?php echo esc_html( $phone ); ?></span>
				</a>

				<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" class="contact__channel">
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
					<span class="contact__channel-label"><?php esc_html_e( 'LinkedIn', 'asadazam' ); ?></span>
					<span class="contact__channel-value">/in/asad-azam</span>
				</a>

			</div>
		</div>
	</div>
</section>
