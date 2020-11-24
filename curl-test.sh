#!/bin/bash
curl -X POST -H "Authorization: key=AAAA_0F2qb4:APA91bFS0lxtyOtgrA99BpK_jrBeT4CsMlAbK7zfDw01RlApBeMMYoVXE6gTmlLpMXsD9Wwf3K4nrvI-cAjtbvIstT4sF3OOM8QSOKf6rWdUvVfotiku_fEk03KsRnTfiG2LjfDcbUa0" -H "Content-Type: application/json" -d '{
  "notification": {
    "title": "HALO",
    "body": "Ini body looh",
    "click_action": "https://fcm.dev.yayasanvitka.id/"
  },
  "to": "fQC5M08V0JO_5N_akXLlNY:APA91bG7uf1F-4-zsJaRR0qSh8iHukTtF0lkAVQtz4exAQX3xEWsqp-Nw7pbUhCY1Re8vRW0nAAM1rxLIplRSoC7MJwX41E6CS0mqtIuqP7ylLaxOLp0rc2ala870Rn7XVLnd_gxIAeI"
}' "https://fcm.googleapis.com/fcm/send"
