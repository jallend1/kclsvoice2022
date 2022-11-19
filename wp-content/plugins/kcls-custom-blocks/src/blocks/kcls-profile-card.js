import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "../editor.scss";

export default function KCLSProfileCard() {
	const KCLSProfileCardBlocks = [
		[
			"core/group",
			{ className: "kcls-profile-card" },
			[
				[
					"core/image",
					{
						url: "https://picsum.photos/200",
						className: "kcls-profile-image is-style-rounded",
					},
				],
				[
					"core/heading",
					{
						level: 2,
						content: "President",
						className: "kcls-profile-title",
					},
				],
				[
					"core/heading",
					{
						level: 3,
						content: "John Doe",
						className: "kcls-profile-name",
					},
				],
				[
					"core/paragraph",
					{
						content:
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod, nisi euismod consectetur aliquam, nisl nisi consectetur nisl, euismod nisi nisl euismod nisl.",
						className: "kcls-profile-description",
					},
				],
			],
		],
	];
	return <InnerBlocks {...useBlockProps()} template={KCLSProfileCardBlocks} />;
}
