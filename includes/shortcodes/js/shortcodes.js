(function() {
    tinymce.PluginManager.add('shortcodes_button', function( editor, url ) {
        editor.addButton( 'shortcodes_button', {
            title: 'Element toevoegen',
            type: 'menubutton',
            icon: 'plus',
            menu: [
                {
                    text: 'Kolommen',
                    onclick: function() {
                        editor.insertContent(this.value());
                    },
                    menu: [
                        {
                            text: '1/2 + 1/2',
                            value: '[row]<br />[column width="one_half"]1/2[/column]<br />[column width="one_half"]1/2[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '1/3 + 1/3 + 1/3',
                            value: '[row]<br />[column width="one_third"]1/3[/column]<br />[column width="one_third"]1/3[/column]<br />[column width="one_third"]1/3[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '2/3 + 1/3',
                            value: '[row]<br />[column width="two_third"]2/3[/column]<br />[column width="one_third"]1/3[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '1/4 + 1/4 + 1/4 + 1/4',
                            value: '[row]<br />[column width="one_fourth"]1/4[/column]<br />[column width="one_fourth"]1/4[/column]<br />[column width="one_fourth"]1/4[/column]<br />[column width="one_fourth"]1/4[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '1/2 + 1/4 + 1/4',
                            value: '[row]<br />[column width="one_half"]1/2[/column]<br />[column width="one_fourth"]1/4[/column]<br />[column width="one_fourth"]1/4[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '3/4 + 1/4',
                            value: '[row]<br />[column width="three_fourth"]3/4[/column]<br />[column width="one_fourth"]1/4[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '1/5 + 1/5 + 1/5 + 1/5 + 1/5',
                            value: '[row]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '2/5 + 1/5 + 1/5 + 1/5',
                            value: '[row]<br />[column width="two_fifth"]2/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '3/5 + 1/5 + 1/5',
                            value: '[row]<br />[column width="three_fifth"]3/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                        {
                            text: '4/5 + 1/5',
                            value: '[row]<br />[column width="four_fifth"]4/5[/column]<br />[column width="one_fifth"]1/5[/column]<br />[/row]',
                            onclick: function(e) {
                                e.stopPropagation();
                                editor.insertContent(this.value());
                            }
                        },
                    ]
                },
                {
                    text: 'Button',
                    onclick: function() {
                        editor.windowManager.open( {
				        title: 'Button',
				        icon: 'plus',
				        body: [{
				            type: 'listbox',
				            name: 'size',
				            label: 'Formaat',
				            'values': [
				                {text: 'Klein', value: 'small'},
				                {text: 'Middel', value: 'medium'},
				                {text: 'Groot', value: 'large'},
				            ]
				        },
				        {
				            type: 'textbox',
				            name: 'text',
				            label: 'Tekst'
				        },
				        {
				            type: 'textbox',
				            name: 'link',
				            label: 'Link (URL)'
				        },
				        {
				            type: 'listbox',
				            name: 'target',
				            label: 'Link openen in',
				            'values': [
				                {text: 'Hetzelfde scherm', value: '_self'},
				                {text: 'Nieuw tabblad', value: '_blank'},
				            ]
				        }],
				        onsubmit: function( e ) {
				            editor.insertContent( '[button size="' + e.data.size + '" link="' + e.data.link + '" target="' + e.data.target + '"]' + e.data.text + '[/button]');
				        }
				    });
                    }
                },
                {
                    text: 'Vraag & antwoord (FAQ)',
                    onclick: function() {
                        editor.windowManager.open( {
				        title: 'Vraag & antwoord (FAQ)',
				        body: [{
				            type: 'textbox',
				            name: 'question',
				            label: 'Vraag'
				        },
				        {
				            type: 'textbox',
				            name: 'answer',
				            label: 'Antwoord'
				        }],
				        onsubmit: function( e ) {
				            editor.insertContent( '[faq title="' + e.data.question + '"]' + e.data.answer + '[/faq]');
				        }
				    });
                    }
                },
                {
                    text: 'Tabbladen of accordion',
                    onclick: function() {
                        editor.windowManager.open( {
				        title: 'Tabbladen of accordion',
				        body: [{
				            type: 'listbox',
				            name: 'tabs_position',
				            label: 'Maak een keuze',
				            'values': [
				                {text: 'Tabbladen horizontaal', value: 'default'},
				                {text: 'Tabbladen verticaal', value: 'vertical'},
				                {text: 'Accordion', value: 'accordion'},
				            ]
				        }],
				        onsubmit: function( e ) {
				            editor.insertContent( '[tab_group type="' + e.data.tabs_position + '"]<br />[tab title="Vul hier de titel van het tabblad in"]Vul hier de inhoud van het tabblad in. Selecteer en kopieer deze regel en plak deze op een nieuwe regel om een nieuw tabblad toe te voegen.[/tab]<br />[/tab_group]');
				        }
				    });
                    }
                }
           ]
        });
    });
})();