<?php

  namespace Emeraldion\Tramezzino\Test;

  error_reporting(E_ALL | E_STRICT);

  // TODO: make a static class

  $FIXTURES = array(
    'A' => array(
      array(
        'l' => 'a',
        'c' => array(NULL)
      )
    ),

    'A_B' => array(
      array(
        'l' => 'a',
        'c' => array(NULL)
      ),
      array(
        'l' => 'b',
        'c' => array(NULL)
      )
    ),

    'A_AB' => array(
      array(
        'l' => 'a',
        'c' => array(
          NULL,
          array(
            'l' => 'b',
            'c' => array(NULL)
          )
        )
      )
    ),

    'ARIA_ANNA' => array(
      array(
        'l' => 'a',
        'c' => array(
          array(
            'l' => 'r',
            'c' => array(
              array(
                'l' => 'i',
                'c' => array(
                  array(
                    'l' => 'a',
                    'c' => array(
                      NULL,
                      array(
                        'l' => 'n',
                        'c' => array(
                          array(
                            'l' => 'n',
                            'c' => array(
                              array(
                                'l' => 'a',
                                'c' => array(NULL)
                              )
                            )
                          )
                        )
                      )
                    )
                  )
                )
              )
            )
          )
        )
      )
    ),

    'ALB_A_ER_GO_O_TO' => array(
      array(
        'l' => 'a',
        'c' => array(
          array(
            'l' => 'l',
            'c' => array(
              array(
                'l' => 'b',
                'c' => array(
                  array(
                    'l' => 'a',
                    'c' => array(NULL)
                  ), array(
                    'l' => 'e',
                    'c' => array(
                      array(
                        'l' => 'r',
                        'c' => array(
                          array(
                            'l' => 'g',
                            'c' => array(
                              array(
                                'l' => 'o',
                                'c' => array(NULL)
                              )
                            )
                          ),
                          array(
                            'l' => 'o',
                            'c' => array(NULL)
                          ),
                          array(
                            'l' => 't',
                            'c' => array(
                              array(
                                'l' => 'o',
                                'c' => array(NULL)
                              )
                            )
                          )
                        )
                      )
                    )
                  )
                )
              )
            )
          )
        )
      )
    ),

    'VIALE_ETTO' => array(
      array(
        'l' => 'v',
        'c' => array(
          array(
            'l' => 'i',
            'c' => array(
              array(
                'l' => 'a',
                'c' => array(
                  array(
                    'l' => 'l',
                    'c' => array(
                      array(
                        'l' => 'e',
                        'c' => array(
                          NULL,
                          array(
                            'l' => 't',
                            'c' => array(
                              array(
                                'l' => 't',
                                'c' => array(
                                  array(
                                    'l' => 'o',
                                    'c' => array(NULL)
                                  )
                                )
                              )
                            )
                          )
                        )
                      )
                    )
                  )
                )
              )
            )
          )
        )
      )
    ),

    'EMPTY_CHILDREN' => array(
      array(
        'l' => 'a',
        'c' => array()
      ),
      array(
        'l' => 'b',
        'c' => array(
          NULL,
          array(
            'l' => 'c',
            'c' => array()
          )
        )
      )
    ),

    'ARRAYS' => array(
      'ALB_A_ER_GO_O_TO' => array('albero', 'alba', 'alberto', 'albergo'),
      'ALBERO_FIORE' => array('albero', 'fiore'),
      'PESCA_TORE_H_ERIA_IERA' => array('pesca', 'pescatore', 'peschiera', 'pescheria'),
      'MARE_INA_IO_IA' => array('mare', 'marina', 'marinaio', 'mario', 'maria'),
      'ISIN_1' => array(
        'XS0258970051', 'XS0283199247', 'XS0299049527', 'XS0318345971', 'XS0484854483',
        'XS0648456167', 'XS0858481194', 'XS0875891615', 'XS0877809375', 'XS0894522795',
        'XS0935881853', 'XS0956262033', 'XS0960889060', 'XS0978719572', 'XS0995130712',
        'XS0996343835', 'XS1033659027', 'XS1038294531', 'XS1053090665', 'XS1059896016',
        'XS1075219763', 'XS1098105254', 'XS1115184753', 'XS1139474206', 'XS1198022706',
        'XS1198278175', 'XS1224031903'
      )
    ),

    'STRINGS' => array(
      'ISIN_1' => 'XS(0(2(58970051|83199247|99049527)|318345971|484854483|648456167|8(58481194|7(5891615|7809375)|94522795)|9(35881853|56262033|60889060|78719572|9(5130712|6343835)))|1(0(3(3659027|8294531)|5(3090665|9896016)|75219763|98105254)|1(15184753|39474206|98(022706|278175))|224031903))'
    ),

    'TREES' => array()
  );

  foreach ($FIXTURES as $key => $arr) {
    $FIXTURES['TREES'][$key] = array(
      'l' => '',
      'c' => $arr
    );
  }

?>
